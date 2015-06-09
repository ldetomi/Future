<?php

/*
 * Copyright (C) 2011 by David Tavarez
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE
 * 
 */

/**
 * checkdnsrr for Windows (from php.net)
 *
 * @param string $host a hostname
 * @param string $type dns type check
 * @return boolean
 */
function win_checkdnsrr($host, $type='MX') {
    if (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN') {
        return false;
    }
    if (empty($host)) {
        return false;
    }
    $types = array('A', 'MX', 'NS', 'SOA', 'PTR', 'CNAME', 'AAAA', 'A6', 'SRV', 'NAPTR', 'TXT', 'ANY');
    if (!in_array($type, $types)) {
        user_error("checkdnsrr() Type '$type' not supported", E_USER_WARNING);
        return false;
    }
    @exec('nslookup -type=' . $type . ' ' . escapeshellcmd($host), $output);
    foreach ($output as $line) {
        if (preg_match('/^' . $host . '/', $line)) {
            return true;
        }
    }
    return false;
}

// Defining the function
if (!function_exists('checkdnsrr')) {

    function checkdnsrr($host, $type='MX') {
        return win_checkdnsrr($host, $type);
    }

}

/**
 * Email_Validator 1.0
 *
 * <code>
 * $email  = 'email@domain.com';
 * if(Email_Validador::validate($email))
 *     echo "Valid email address.";
 * else echo "Invalid email address.";
 * </code>
 * 
 * @author David Tavarez <contacto@davidtavarez.com>
 * @version 1.0
 */
final class Email_Validador {

    /**
     * List of black list domains checkers.
     *
     * @var array
     * @access private
     */
    static private $_blacklist_domains = array("bl.spamcop.net", "list.dsbl.org", "sbl.spamhaus.org");

    /**
     * Verify if a domain is on black list.
     *
     * @param string $domain domain name.
     * @access public
     * @return boolean
     */
    public static function check_domain_is_blacklisted($domain) {
        if (preg_match("/^[a-z0-9][a-z0-9\-]+[a-z0-9](\.[a-z]{2,4})+$/i", $domain)) {
            $ip = gethostbyname($domain);
            $reverse_ip = implode(".", array_reverse(explode(".", $ip)));
            foreach (self::$_blacklist_domains as $dnsbl_list) {
                if (checkdnsrr($reverse_ip . "." . $dnsbl_list . ".", "A"))
                    return $reverse_ip . "." . $dnsbl_list;
            }
        }
        return false;
    }

    /**
     * Verify is an email have the correct format.
     *
     * @param string $email an email adress.
     * @access public
     * @return boolean
     */
    public static function check_string($email) {
        return preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' . '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', $email);
    }

    /**
     * Complete validation of an email address.
     *
     * @param string $email a email adress.
     * @access public
     * @return boolean
     */
    public static function validate($email) {
        if (self::check_string($email)) {
            $ar = explode("@", $email);
            $domain = $ar[1];
            unset($ar);
            if (self::check_domain_is_blacklisted($domain)) {
                if (self::validate_domain($domain))
                    return true;
            }
        }
        return false;
    }

    /**
     * Verify if the domain is valid.
     *
     * @param string $domain a domain name.
     * @access public
     * @return boolean
     */
    public static function validate_domain($domain) {
        if (preg_match("/^[a-z0-9][a-z0-9\-]+[a-z0-9](\.[a-z]{2,4})+$/i", $domain)) {
            if ($this->_domain_is_blacklisted($domain) === false) {
                if (checkdnsrr($domain, 'MX'))
                    return true;
                if (checkdnsrr($domain, 'A'))
                    return true;
            }
        }
    }

}