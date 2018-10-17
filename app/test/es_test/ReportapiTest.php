<?php
/**
 * VisualPHPUnit
 *
 * VisualPHPUnit is a visual front-end for PHPUnit.
 *
 * PHP Version 5.3<
 *
 * @author    Nick Sinopoli <NSinopoli@gmail.com>
 * @copyright 2011-2015 VisualPHPUnit
 * @license   http://opensource.org/licenses/BSD-3-Clause The BSD License
 * @link      https://github.com/VisualPHPUnit/VisualPHPUnit VisualPHPUnit
 */
namespace visualphpunit;

use \PHPUnit_Framework_TestCase;

/**
 * Data test
 *
 * Testing class
 *
 * @author Nick Sinopoli <NSinopoli@gmail.com>
 */
class ReportapiTest extends PHPUnit_Framework_TestCase
{

    /**
     * DAU
     *
     * @test
     */
    public function dauReport()
    {
        $target_cgi = 'http://local.dc.com/api/events/';

        $day = mt_rand(1,365);
        $time = strtotime("- {$day} day");
        $post_data = [
            'e'                 => 'login',
            'app_id'            => rand(1,10),
            'channel_id'        => rand(1800, 2000),
            'userid'            => rand(100000, 200000),
            'log_time'          => $time,
            'ip'                => '127.0.0.1',
            'aaaa'              => 'bbbb',
            'bbbb'              => 'bbbb',
            'dddd'              => 'bbbb',
            'cccc'              => 'bbbb',
            'eeee'              => 'bbbb',
            'usernick'          => 'xxxxx',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_cgi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        $result = curl_exec($ch);
        var_dump( $result ) ;
        if ( curl_errno($ch) ) {
            var_dump( curl_error( $ch ) );
        }

        curl_close($ch);
    }

    /**
     * 注册上报
     *
     * @test
     */
    public function regReport()
    {
        return;
        $target_cgi = 'http://local.dc.com/api/events/';

        $day = mt_rand(1,365);
        $time = strtotime("- {$day} day");
        $post_data = [
            'e'                 => 'registe',
            'app_id'            => rand(1,10),
            'channel_id'        => rand(1800, 2000),
            'userid'            => rand(100000, 200000),
            'log_time'          => $time,
            'ip'                => '127.0.0.1',
            'usernick'          => 'nick.'.time(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_cgi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        $result = curl_exec($ch);
        var_dump( $result ) ;
        if ( curl_errno($ch) ) {
            var_dump( curl_error( $ch ) );
        }

        curl_close($ch);
    }

}
