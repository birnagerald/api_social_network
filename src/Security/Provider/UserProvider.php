<?php


namespace App\Security\Provider;


use App\Entity\User;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{

    /**
     * @var UserLoaderInterface
     */
    private UserLoaderInterface $userLoader;

    /**
     * UserProvider constructor.
     * @param UserLoaderInterface $userLoader
     */
    public function __construct(UserLoaderInterface $userLoader)
    {
        $this->userLoader = $userLoader;
    }

    public function loadUserByUsername(string $username): UserInterface
    {
        return $this->userLoader->loadUserByUsername($username);
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        // TODO: Implement refreshUser() method.
    }

    public function supportsClass(string $class): bool
    {
        return $class === User::class;
    }
}