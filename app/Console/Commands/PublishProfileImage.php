<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PublishProfileImage extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'avatar:publish {avatar=1}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Publish an user avatar from \'public/img/avatar\' to storage in \'storage/app/public/img/profile\' as default.png';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $availabelAvatarPath = public_path('img/avatar');

    if ( File::isDirectory($availabelAvatarPath) ) {
      $profileImagePaths = ['public', 'img', 'profile'];

      $publicStorage = Storage::disk('public');
      $localStorage = Storage::disk('local');
      
      if ( !$localStorage->exists(join('/', $profileImagePaths)) ) {
        $profileImagePath = '';
        foreach ( $profileImagePaths as $path ) {
          $profileImagePath .= $path . '/';
          $localStorage->makeDirectory(rtrim($profileImagePath, '/'));
        }
      }

      if ( $publicStorage->exists('img/profile') ) {
        $avatar = $this->argument('avatar');
        $imgPath = public_path('img/avatar/avatar-' . $avatar);
        $imgTypes = ['jpg', 'png', 'jpeg'];

        $imgType = collect($imgTypes)
          ->filter(function($type) use ($imgPath) {
            return File::isFile($imgPath . '.' . $type);
          })
          ->values();

        if ( $imgType->count() ) {
          $imgType = $imgType->first();
          $imgPath = $imgPath . '.' . $imgType;

          $imgPathToStorage = storage_path('app/public/img/profile/default.' . $imgType);

          $storageHasDefaultImg = collect($imgTypes)
            ->filter(function($type) use ($publicStorage) {
              return $publicStorage->exists('img/profile/default.' . $type);
            })
            ->values();

          if ( $storageHasDefaultImg->count() ) {
            $publicStorage->delete('img/profile/default.' . $storageHasDefaultImg->first());
          }

          if ( File::copy($imgPath, $imgPathToStorage) ) {
            $invertentionImage = Image::make($imgPathToStorage);

            if ( $invertentionImage->width() > 500 ) {
              $invertentionImage->resize(500, null);
            }
      
            if ( $invertentionImage->height() > 500 ) {
              $invertentionImage->resize(null, 500);
            }
          } 
        } else {
          $this->error("'avatar-$avatar' was not found in '$availabelAvatarPath'.");
          return;
        }
      }

      if ( !File::isDirectory(public_path('storage')) ) {
        $this->call('storage:link');
      }

      $this->info('Profile image was succesfully published.');
    } else {
      $this->error($availabelAvatarPath . ' not found.');
      return;
    }
  }
}
