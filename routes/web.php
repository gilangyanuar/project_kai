<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard.index')->name('dashboard');
Route::view('/login', 'auth.login');
Route::view('/user', 'user.index')->name('user.index');
Route::view('/user/edit', 'user.edit')->name('user.edit');
Route::view('/user/create', 'user.create')->name('user.create');
Route::view('/arsip-laporan', 'arsip-laporan.index')->name('arsip.index');
Route::prefix('master-data')->name('master.')->group(function () {
    Route::view('/', 'master-data.index')->name('index');
    Route::view('/toolkit/edit', 'master-data.toolkit.edit')->name('toolkit.edit');
    Route::view('/toolkit/pemeriksaan', 'master-data.toolkit.pemeriksaan')->name('toolkit.pemeriksaan');
    Route::view('/toolkit/informasi-pemeriksaan', 'master-data.toolkit.informasi-pemeriksaan')->name('toolkit.informasi-pemeriksaan');

    Route::view('/toolbox/edit', 'master-data.toolbox.edit')->name('toolbox.edit');
    Route::view('/toolbox/pemeriksaan', 'master-data.toolbox.pemeriksaan')->name('toolbox.pemeriksaan');
    Route::view('/toolbox/informasi-pemeriksaan', 'master-data.toolbox.informasi-pemeriksaan')->name('toolbox.informasi-pemeriksaan');

    Route::view('/mekanik/edit', 'master-data.mekanik.edit')->name('mekanik.edit');
    Route::view('/mekanik/pemeriksaan', 'master-data.mekanik.pemeriksaan')->name('mekanik.pemeriksaan');
    Route::view('/mekanik/informasi-pemeriksaan', 'master-data.mekanik.informasi-pemeriksaan')->name('mekanik.informasi-pemeriksaan');

    Route::view('/mekanik2/edit', 'master-data.mekanik2.edit')->name('mekanik2.edit');
    Route::view('/mekanik2/pemeriksaan', 'master-data.mekanik2.pemeriksaan')->name('mekanik2.pemeriksaan');
    Route::view('/mekanik2/informasi-pemeriksaan', 'master-data.mekanik2.informasi-pemeriksaan')->name('mekanik2.informasi-pemeriksaan');

    Route::view('/genset/edit', 'master-data.genset.edit')->name('genset.edit');
    Route::view('/genset/data-ka-crew', 'master-data.genset.data-ka-crew')->name('genset.data-ka-crew');
    Route::view('/genset/informasi-pemeriksaan', 'master-data.genset.informasi-pemeriksaan')->name('genset.informasi-pemeriksaan');

    Route::view('/elektric/edit', 'master-data.elektric.edit')->name('elektric.edit');
    Route::view('/elektric/data-ka-crew', 'master-data.elektric.data-ka-crew')->name('elektric.data-ka-crew');
    Route::view('/elektric/informasi-pemeriksaan', 'master-data.elektric.informasi-pemeriksaan')->name('elektric.informasi-pemeriksaan');

    Route::view('/log-gangguan/edit', 'master-data.log-gangguan.edit')->name('log-gangguan.edit');
    Route::view('/log-gangguan/gangguan-kereta', 'master-data.log-gangguan.gangguan-kereta')->name('log-gangguan.gangguan-kereta');
    Route::view('/log-gangguan/informasi-pemeriksaan', 'master-data.log-gangguan.informasi-pemeriksaan')->name('log-gangguan.informasi-pemeriksaan');
});
