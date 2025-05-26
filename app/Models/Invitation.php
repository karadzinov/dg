<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    protected $fillable = [
        'name',
        'years',
        'male_name',
        'female_name',
        'male_text',
        'female_text',
        'main_text',
        'template',
        'invitation_link',
        'male_photo',
        'female_photo',
        'group_photo',
        'date',
        'restaurant_id',
        'user_id',
        'male_quote',
        'female_quote',
        'email',
        'lat',
        'lng',
        'hash',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function guests()
    {
        return $this->hasMany(Guests::class)->orderBy('id', 'desc')->get();
    }

    public function guestsCount()
    {
        return $this->hasMany(Guests::class)->count();
    }

    public function guestsConfirmed()
    {
        return $this->hasMany(Guests::class)->where('confirmed', '=', 1)->count();
    }

    public function guestsWaiting()
    {
        return $this->hasMany(Guests::class)->where('confirmed', '=', 0)->count();
    }


    public function countVegans()
    {
        return  $this->hasMany(Guests::class)->where('menu_option', '=', 'vegan')->count();
    }

    public function countVegetarians()
    {
        return  $this->hasMany(Guests::class)->where('menu_option', '=', 'vegetarian')->count();
    }

    public function countHalal()
    {
        return  $this->hasMany(Guests::class)->where('menu_option', '=', 'halal')->count();
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public static function generateUniqueInvitationLink($base)
    {
        $slug = Str::slug($base);
        $original = $slug;
        $counter = 1;

        while (self::where('invitation_link', $slug)->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }
        return $slug;
    }

    public static function createInvitation($data)
    {
        // Generate invitation texts
        $male_text = "<p>На секој човек му е потребен животен сопатник, многу љубов и разбирање.</p>
        <p>Ако сонцето ја има месечината, денот ја има ноќта, планината го има морето, животот ја има смртта, длабочината ја има висината, галамата ја има тишината, среќата ја има тагата, доброто го има злото - јас ја имам {$data['mrs']} . Таа е сè што недостасуваше во мојот живот, а заедно сме енергијата, земјата, водата, воздухот и огнот. Ви благодарам што сте дел од нашиот живот.</p>
        <p>Дојдете да си поминеме убаво!</p>";

        $male_quote = '<p>Доста време ерген одев, доста лични моми водев, дојде време да се женам, овој живот да го сменам.</p>';

        $female_text = "<p>Како секоја принцеза, така и јас сонував за принцот на бел коњ. Но, за кратко време сфатив дека реалноста е многу поубава од секоја бајка, од секој коњ, од секој сон... Наместо да се плашам од иднината, решив после една година да влезам во една друга реалност која ме научи на мир, среќа и на решителност. Заедно со {$data['mr']} постигнавме многу за кратко време и едвај чекам да видам што можеме да направиме понатаму. Но, без Вашата поддршка, љубов и грижа, никогаш немаше да бидеме тука.</p>";

        $female_quote = '<p>"We mature in knowledge and wisdom but never leave the playground of our hearts."</p>';

        $main_text = 'Со огромна чест и задоволство Ве покануваме заедно да ја прославиме една од нашите најважни вечери во животот. Од Вас очекуваме да донесете само позитивна енергија и удобни чевли за играње. Се гледаме!';

        // Create the Invitation record
        return self::create([
            'male_name' => $data['mr'],
            'female_name' => $data['mrs'],
            'date' => $data['date'] ?? now(),
            'template' => $data['template'],
            'invitation_link' => $data['basic_url'],
            'male_photo' => $data['male_photo'],
            'female_photo' => $data['female_photo'],
            'group_photo' => $data['group_photo'],
            'restaurant_id' => $data['restaurant_id'],
            'user_id' => $data['user_id'] ?? null,  // Only if a user exists
            'email' => $data['email'],
            'male_text' => $male_text,
            'female_text' => $female_text,
            'main_text' => $main_text,
            'male_quote' => $male_quote,
            'female_quote' => $female_quote,
            'hash' => md5($data['email']),
        ]);
    }
}
