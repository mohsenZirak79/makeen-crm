<?php

namespace App\Http\Controllers\BaleBot;

use App\Http\Controllers\Controller;
use App\Models\Bot_command;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebhookController extends Controller
{

    //dear developer,if you want to add new command just seed it into the database and add a new function with name like your command.
    // keep it in mind that your command should start with '/' but your function should not.
    //example command=>/start , function=>start.
    // function handle is your input of all request come from bot
    public function handle(Request $request): void
    {
        $data=$request->yek;
        $firstCharacter = substr($data['message']['text'], 0, 1);
        //-----------------------------------------------------------------------------------
        if ($firstCharacter == '/') {
            if (Bot_command::where('command' , $data['message']['text'])->exists()) {
                $command = substr($data['message']['text'], 1);
                WebhookController::$command($data);
            }else{
                self::sendMessage($data['message']['chat']['id'],'دستور مورد نظر یافت نشد');
            }
        }
        //-----------------------------------------------------------------------------------
        if(isset($data['message']['contact']['phone_number'])){
           self::setInformation($data);
        }
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    public function start($data): void
    {
       $user =  User::where('chat_id',$data['message']['chat']['id'])->first();

        if ($user) {
            self::sendMessage($data['message']['chat']['id'],' خوش امدید' . $user->phone_number . 'کاربر گرامی به شماره ');
        }else{
            $replyMarkup =[
                'keyboard' => [[['text' => 'ارسال شماره تلفن', 'request_contact' => true]]],
                'resize_keyboard' => true,
                'one_time_keyboard' => true
            ];
            self::sendMessage($data['message']['chat']['id'],'برای ثبت شماره همراه خود روی دکمه زیر کلیک فرمایید' , $replyMarkup);
        }
    }

    public function setInformation($data): void
    {
       $output_str = '0' . substr($data['message']['contact']['phone_number'], 2);
       $user =  User::where('phone_number', $output_str)->first();
       if ($user->chat_id === null) {
           $user->update([
               'chat_id'=>$data['message']['chat']['id'],
           ]);
           $replyMarkupRemove = ['remove_keyboard' => true];
           self::sendMessage($data['message']['chat']['id'],'شماره شما با موفقیت ثبت شد' , $replyMarkupRemove);
       }else{
           self::sendMessage($data['message']['chat']['id'],'کاربر گرامی شماره شما قبلا ثبت شده است' );
       }
    }

    public function sendMessage($chat_id, $message , $keyboard = null): void
    {
        Http::post('https://tapi.bale.ai/bot322477666:iO4GjDLkB2QvBi9Al5QRU1PBJ7AO2pt6Zcmvt6Hs/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'reply_markup' => json_encode($keyboard),
        ]);
    }
}

