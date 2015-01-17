<?php

Route::group(array('prefix'=>'test'),function(){
    Route::get('upload', function(){
    if(Input::file())
        dd(Input::file("file"));
    return View::make('html.upload');
    });

    Route::get('db',function(){
        $file = '/uploads/avatar/20150116/14213877919623.jpg';
        pf(\Lib\File::resize($file,100,100,'adapter'));
    });

    Route::get('view',function(){
        return View::make('html.index');
    });

    Route::post('upload', function(){
        $file = Input::file('file');
        pf(do_upload('file','avatars'));
        return View::make('html.upload');
    });

    Route::get('role/{id?}',function(){
        //dd(Route::getRoutes());
        dd(Request::method());
    });
});