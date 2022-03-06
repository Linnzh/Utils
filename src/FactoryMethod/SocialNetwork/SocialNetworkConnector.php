<?php


namespace Linnzh\Utils\FactoryMethod\SocialNetwork;


interface SocialNetworkConnector
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost(string $content): void;
}
