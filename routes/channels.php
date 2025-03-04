
<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('karaoke.{id}', function ($user, $id) {
    return true; // Add your authorization logic here
});