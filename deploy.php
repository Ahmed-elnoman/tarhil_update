<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
// require 'contrib/npm.php';

set('application', 'tarhil');
set('repository', 'git@github.com:Almandeel/tar.git');
// set('php_fpm_version', '8.0');
set('writable_mode', 'chmod');



host('tarhilcom')
    ->set('remote_user', 'dz524v21')
    ->set('git_ssh_command', 'ssh')
    ->set('hostname', 'lhcp4022.webapps.net')
    ->set('port', '25088')
    ->set('deploy_path', '~/app.tarhil.com');

host('tarhilsd')
->set('http_user', 'tarhilsd')
->set('remote_user', 'tarhilsd')
->set('hostname', 'tarhil.sd')
->set('deploy_path', '~/app.tarhil.sd');


// host('dev')
//     ->set('remote_user', 'fvccdoee')
//     ->set('hostname', 'exo-contructing.com')
//     ->set('deploy_path', '~/dev.exo-contructing.com');

// host('mobile')
//     ->set('remote_user', 'spatiula')
//     ->set('hostname', 'spatiulab.com')
//     ->set('deploy_path', '~/exo.spatiulab.com');


task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    // 'artisan:key:generate',
    'artisan:storage:link',
    // 'artisan:view:cache',
    // 'artisan:config:cache',
    'artisan:optimize:clear',
    'artisan:migrate',
    // 'artisan:db:seed',
    // 'npm:install',
    // 'npm:run:prod',
    'deploy:publish',
    // 'php-fpm:reload',
]);

// task('npm:run:prod', function () {
//     cd('{{release_or_current_path}}');
//     run('npm run prod');
// });

after('deploy:failed', 'deploy:unlock');