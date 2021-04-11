<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('showHome'));
});
// Network
Breadcrumbs::for('addNetwork', function ($trail) {
    $trail->parent('home');
    $trail->push('Add network');
});

Breadcrumbs::for('updateNetwork', function ($trail, $network) {
    $trail->parent('home');
    $trail->push($network->name);
    $trail->push('Update network');
});

// Network Channels

Breadcrumbs::for('showNetworkChannels', function ($trail,$network) {
    $trail->parent('home');
    $trail->push($network->name);
    $trail->push('Channels',route('showNetworkChannels',$network->id));
});

Breadcrumbs::for('showAddNetworkChannel', function ($trail,$network) {
    $trail->parent('showNetworkChannels',$network);
    $trail->push($network->name);
    $trail->push('Add a channel');
});


Breadcrumbs::for('showUpdateChannel', function ($trail,$channel) {
    $trail->parent('showNetworkChannels',$channel->network);
    $trail->push($channel->name);
    $trail->push('Update channel');
});

Breadcrumbs::for('showUploadChannelZip', function ($trail,$channel) {
    $trail->parent('showNetworkChannels',$channel->network);
    $trail->push($channel->name);
    $trail->push('Upload zip');
});

// Network Players

Breadcrumbs::for('showNetworkPlayers', function ($trail,$network) {
    $trail->parent('home');
    $trail->push($network->name);
    $trail->push('Players',route('showNetworkPlayers',$network->id));
});

Breadcrumbs::for('showAddNetworkPlayer', function ($trail,$network) {
    $trail->parent('showNetworkPlayers',$network);
    $trail->push($network->name);
    $trail->push('Add a player');
});


Breadcrumbs::for('showUpdateplayer', function ($trail,$player) {
    $trail->parent('showNetworkPlayers',$player->channel->network);
    $trail->push($player->name);
    $trail->push('Update player');
});




Breadcrumbs::for('showPlayers', function ($trail) {
    $trail->parent('home');
    $trail->push('Players', route('showPlayers'));
});



// Role
Breadcrumbs::for('roles', function ($trail) {
    $trail->push('Roles', route('showRoles'));
});

Breadcrumbs::for('addRole', function ($trail) {
    $trail->parent('roles');
    $trail->push('Add a role');
});

Breadcrumbs::for('updateRole', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push($role->formatName());
    $trail->push('Update a role');
});



// User
Breadcrumbs::for('users', function ($trail) {
    $trail->push('Users', route('showUsers'));
});

Breadcrumbs::for('addUser', function ($trail) {
    $trail->parent('users');
    $trail->push('Add a user');
});

Breadcrumbs::for('updateUser', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->formatName());
    $trail->push('Update a user');
});


// Media

Breadcrumbs::for('showImages', function ($trail) {
    $trail->parent('home');
    $trail->push('Photos', route('showImages'));
});

Breadcrumbs::for('showVideos', function ($trail) {
    $trail->parent('showImages');
    $trail->push('Videos', route('showVideos'));
});

Breadcrumbs::for('showAddMedia', function ($trail) {
    $trail->parent('showVideos');
    $trail->push('Add media');
});



// Emails

Breadcrumbs::for('showEmails', function ($trail) {
    $trail->parent('home');
    $trail->push('Emails', route('showEmails'));
});

Breadcrumbs::for('addEmail', function ($trail) {
    $trail->parent('showEmails');
    $trail->push('Add Email');
});

Breadcrumbs::for('updateEmail', function ($trail,$email) {
    $trail->parent('showEmails');
    $trail->push($email->address);
    $trail->push('Update');
});



// Plannings

Breadcrumbs::for('showPlannings', function ($trail) {
    $trail->parent('home');
    $trail->push('Plannings', route('showPlannings'));
});

Breadcrumbs::for('addPlanning', function ($trail) {
    $trail->parent('showPlannings');
    $trail->push('Add Planning');
});

Breadcrumbs::for('updatePlanning', function ($trail,$planning) {
    $trail->parent('showPlannings');
    $trail->push($planning->player->name);
    $trail->push('Update');
});