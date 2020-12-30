<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddUserComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user-comment {userId} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds Comments to User Id';

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
     * @return int
     */
    public function handle()
    {
        //getting id and comment
        $userId = $this->argument('userId');
        $comment = $this->argument('comment');
        
        //finding user
        $user = User::find($userId); 

        if($user){
            if(!empty($comment)){
                $existingComments = $user->comments;
                $user->comments = $existingComments.'\n'.$comment;
                $user->save();
                dump('OK');
            }
        }else{
            dump('No such user ('.$userId.')');
        }
    }
}
