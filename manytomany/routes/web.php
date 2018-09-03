<?php
use App\User;
use APp\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    
    $user=User::find(1);
    //$role=new Role(['name'=>'admin']);
    //$user->roles()->save($role);
    $user->roles()->save(new Role(['name'=>'author']));

});

Route::get('/read', function () {
    
    $user=User::findOrFail(1);
    foreach ($user->roles as $role) {
        echo $role->name;
    }

});

Route::get('/update', function () {
    
    $user=User::findOrFail(1);
    if ($user->has('roles')) {
        
        foreach ($user->roles as $role) {
            
            if ($role->name=='admin') {
                $role->name='subscriber';  
                $role->save();
            }

        }

    }

});

Route::get('/delete', function () {
    
    $user=User::findOrFail(1);
    foreach ($user->roles as $role) {
        $role->whereId(4)->delete();
    }

});

Route::get('/attach', function () {
//this function will create new data and sametime will assign it to a user
    $user=User::findOrFail(1);
    $user->roles()->attach(3);
    
});

Route::get('/detach', function () {
        $user=User::findOrFail(1);
        $user->roles()->detach(3);
        
});

Route::get('/sync', function () {

    $user=User::findOrFail(1);
    $user->roles()->sync([4,5]);

});
