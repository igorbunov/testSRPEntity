<?php

require_once '_loader.php';

use \User\UserEntity;
use \Log\DBLogger;
use \Entity\LoggedEntity;
use \Entity\UniqueEntity;
use \Entity\CachedEntity;
use \Log\FileLogger;
use \Cache\Memcache;
use \User\UserEntityCollection;
use \Collection\QueryLimit;

echo '<br/>';

$user = new UserEntity();

$userDBLogged = new LoggedEntity(new UserEntity(), new DBLogger());

$userFileLogged = new LoggedEntity(new UserEntity(), new FileLogger());

$uniqueUser = new UniqueEntity(new UserEntity());

$uniqueDBLoggedUser = new LoggedEntity(
    new UniqueEntity(new UserEntity()),
    new DBLogger()
);

$cachedUser = new CachedEntity(new UserEntity(), new Memcache());

$cachedDBLoggedUser = new LoggedEntity(
    new CachedEntity(new UserEntity(), new Memcache()),
    new FileLogger()
);

$uniqueCachedDBLoggedUser = new UniqueEntity(
    new LoggedEntity(
        new CachedEntity(new UserEntity(), new Memcache()),
        new FileLogger()
    )
);

pre($user);
pre($userDBLogged);
pre($userFileLogged);
pre($uniqueUser);
pre($uniqueDBLoggedUser);
pre($cachedUser);
pre($cachedDBLoggedUser);
pre($uniqueCachedDBLoggedUser);

pre(is_a($user, \Entity\IEntity::class));
pre(is_a($userDBLogged, \Entity\IEntity::class));
pre(is_a($userFileLogged, \Entity\IEntity::class));
pre(is_a($uniqueUser, \Entity\IEntity::class));
pre(is_a($uniqueDBLoggedUser, \Entity\IEntity::class));
pre(is_a($cachedUser, \Entity\IEntity::class));
pre(is_a($cachedDBLoggedUser, \Entity\IEntity::class));
pre(is_a($uniqueCachedDBLoggedUser, \Entity\IEntity::class));

$users = new UserEntityCollection();
$usersResult = $users->findByFilter(['status' => 'active'], new QueryLimit(0, 15));

$usersResult->each(function($item, $index) {
    pre($item, $index);
});