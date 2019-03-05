<?php

namespace DariusIII\Forum;

/**
 * Implement how to resolve the Vanilla user associated with the Auth::user()
 */
interface UserMapperInterface
{
    /**
     * Return the current user.  This mechanism picks the Vanilla User
     * corresponding to `Auth::user()` (if logged in) and `Auth::guest()` (if
     * not logged in).
     *
     * @return DariusIII\Forum\User
     * @throws DariusIII\Forum\NoVanillaUserMappedToAuthenticatedUser
     * @throws DariusIII\Forum\NoVanillaUserMappedToGuest
     */
    public function current();

    /**
     * The logic to map a Laravel user into a Vanilla user.
     *
     * If the presented user is null, then there isn't currently one and the
     * resolver should treat this as the "guest" or "anonymous" user.
     *
     * @param mixed $user
     * @return DariusIII\Forum\User
     * @throws DariusIII\Forum\NoVanillaUserMappedToUser
     */
    public function resolve(\Illuminate\Auth\UserInterface $user = null);
}
