<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('user_chat', function () {
    return true; // Kanala kimlerin erişebileceğine karar verir. `true` yaparak herkesin erişmesini sağlarız.
});
