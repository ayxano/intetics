<?php
namespace Helpers;

class TokenHelper
{
    public static function getToken() : string
    {
        $token = md5(uniqid(mt_rand(), true));
        $_SESSION['tokens'][] = $token;
        return $token;
    }

    public static function validateToken(string $token) : bool
    {
        return in_array($token, $_SESSION['tokens'] ?? []);
    }
}