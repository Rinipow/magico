<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository extends EntityRepository implements UserLoaderInterface
{

    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     *
     * @param string $input The username
     *
     * @return UserInterface|null
     */
    public function loadUserByUsername($input)
    {
        try {
            $qb = $this->createQueryBuilder('user');
            $qb
                ->andWhere(
                    $qb->expr()->orX()
                        ->add($qb->expr()->eq('user.username', ':input'))
                        ->add($qb->expr()->eq('user.email', ':input'))
                )
                ->setMaxResults(1)
                ->setParameter('input', $input);

            return $qb->getQuery()->getSingleResult();
        } catch (NonUniqueResultException | NoResultException $e) {
            throw  new UsernameNotFoundException($input, NULL, $e);
        }
    }
}