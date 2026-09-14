<?php


namespace Src\Views\Blog\Music;


use JointApp\SettingsEnv;
use JointApp\Views\TpView;

class TpView_Blog_Jokes_FavMusic extends TpView
{
    public array $recordsList = [];

    public $css = ['music' => '/css/blog/articles/music.css', ];
    public $js = ['music' => '/js/blog/articles/music.js', ];

    const MUSIC_TRACKS_DIR = '/userdata/music';

    public function getDefaultLang()
    {
        $class_Name = 'Src\LangFiles\Views\Blog\Articles\Music\LangFiles_'.self::ucfirstLang($this->userLang).'_Views_B_A_FavMusic';
        return new $class_Name();
    }

    public function getResponseHtml(): string
    {
        $this->recordsList = $this->getTrackList();

        $return = '<div class="ac-wrap">'.
            '<audio controls="controls" autoplay id="htmlMusicPlayer">'.
            '</audio>'.
            '</div>'.
            '<div class="tracks-list" id="music-album">';
        if(count($this->recordsList)){
            $return.= '<div class="track-line caption">'.
                '<div class="track-num">No</div>'.
                '<div class="track-artist">'.$this->langFile::MUSIC_ROW_ARTIST.'</div>'.
                '<div class="track-name">'.$this->langFile::MUSIC_ROW_RECORD.'</div>'.
                '<div class="track-play">'.$this->langFile::MUSIC_ROW_BTN.'</div>'.
                '</div>';

            $track_num = 0;

            foreach ($this->recordsList  as $track_name => $track_row){
                $track_num++;
                $return.= '<div class="track-line">'.
                    '<div class="track-num">'.$track_num.'</div>'.
                    '<div class="track-artist">'.$track_row['artist'].'</div>'.
                    '<div class="track-name">'.
                    '<a href="'.self::MUSIC_TRACKS_DIR.'/'.$track_row['file'].'">'.$track_name.'</a>'.
                    '</div>'.
                    '<div class="track-play"><input type="button" value="Play"></div>'.
                    '</div>';
            }
        }

        $return.= '</div>';
        return $return;
    }

    private function getTrackList():array
    {
        return [
            'I Am Good' => [
                'artist' => 'Bebe Rexha',
                'file'=>'Bebe Rexha - I Am Good.mp3',
            ],
            'Dont Stop' => [
                'artist' => 'Rihanna',
                'file'=>'Rihanna - Dont Stop.mp3',
            ],
            'APT' => [
                'artist' => 'Rose and Bruno Mars',
                'file'=>'RoseAndBrunoMars-APT.mp3',
            ],
            'Unstoppable' => [
                'artist' => 'Sia',
                'file'=>'Sia-Unstoppable.mp3',
            ],
            'Till I collapse' => [
                'artist' => 'Eminem',
                'file'=>'Eminem-TillICollapse.mp3',
            ],
            'Bad' => [
                'artist' => 'Michael Jackson',
                'file'=>'Michael Jackson - Bad.mp3',
            ],
            'Don t speak' => [
                'artist' => 'No Doubt',
                'file'=>'No Doubt - Don t speak.mp3',
            ],
            'Have a nice day' => [
                'artist' => 'Bon Jovi',
                'file'=>'BonJovi-HaveANiceDay.mp3',
            ],
            'Lovers on the Sun' => [
                'artist' => 'David Guetta',
                'file'=>'David Guetta - Lovers on the Sun.mp3',
            ],
            'Uhn tiss' => [
                'artist' => 'Bloodhound gang',
                'file'=>'BloodhoundGang-UhnTiss.mp3',
            ],
            'Ganstas"s paradise' => [
                'artist' => 'Coolio',
                'file'=>'Coolio-GanstasParadise.mp3',
            ],
            'I kissed a girl' => [
                'artist' => 'KatyPerry',
                'file'=>'KatyPerry-IKissedAGirl.mp3',
            ],
            'Goodnight Moon' => [
                'artist' => 'Shivaree',
                'file'=>'Shivaree - Goodnight Moon.mp3',
            ],
            'Counting stars' => [
                'artist' => 'One republic',
                'file'=>'OneRepublic-CountingStars.mp3',
            ],
            'Hollywood tonight' => [
                'artist' => 'Michael Jackson',
                'file'=>'MichaelJackson-HollywoodTonight.mp3',
            ],
            'Stressed out' => [
                'artist' => 'Twenty one pilots',
                'file'=>'TwentyOnePilots-StressedOut.mp3',
            ],
            'Self Control' => [
                'artist' => 'Bebe Rexha',
                'file'=>'BebeRexha-SelfControl.mp3',
            ],
            'Hot' => [
                'artist' => 'Parah dice',
                'file'=>'ParahDice-Hot.mp3',
            ],
            'Let’s Get It Started' => [
                'artist' => 'Black Eyed Peas',
                'file'=>'BlackEyedPeas-Lets Get It Started.mp3',
            ],
            'My Favourite Game' => [
                'artist' => 'Cardigans',
                'file'=>'Cardigans-My Favourite Game.mp3',
            ],
            'Mr. Saxobeat' => [
                'artist' => 'Alexandra Stan',
                'file'=>'Alexandra Stan-Mr. Saxobeat.mp3',
            ],
            'Flames' => [
                'artist' => 'Sia',
                'file'=>'Sia-Flames.mp3',
            ],
            'Get Lucky' => [
                'artist' => 'Daft Punk',
                'file'=>'Daft Punk-Get Lucky.mp3',
            ],
            'Lemon Tree' => [
                'artist' => 'Fools Garden',
                'file'=>'Fools Garden - Lemon Tree.mp3',
            ],
            'Cheap thrills' => [
                'artist' => 'Sia',
                'file'=>'Sia-Cheap thrills.mp3',
            ],
            'The Business' => [
                'artist' => 'Tiësto',
                'file'=>'Tiesto-The Business.mp3',
            ],
            'La la la' => [
                'artist' => 'Naughty Boy',
                'file'=>'Naughty Boy-La la la.mp3',
            ],
            'Ok' => [
                'artist' => 'Robin Schulz',
                'file'=>'Robin Schulz-Ok.mp3',
            ],
            'Break My Heart' => [
                'artist' => 'Dua Lipa',
                'file'=>'Dua Lipa-Break My Heart.mp3',
            ],
            'Don’t Worry Be Happy' => [
                'artist' => 'Bobby McFerrin',
                'file'=>'Bobby McFerrin-Dont Worry Be Happy.mp3',
            ],
            'Sweet Dreams' => [
                'artist' => 'Eurythmics',
                'file'=>'Eurythmics-Sweet Dreams.mp3',
            ],
            'No Stress' => [
                'artist' => 'Laurent Wolf',
                'file'=>'Laurent Wolf-No Stress.mp3',
            ],
            'Love Is Gone' => [
                'artist' => 'David Guetta',
                'file'=>'David Guetta-Love Is Gone.mp3',
            ],
            'Meet Me Halfway' => [
                'artist' => 'Black Eyed Peas',
                'file'=>'Black Eyed Peas - Meet Me Halfway.mp3',
            ],
            'When We Stand Together' => [
                'artist' => 'Nickelback',
                'file'=>'Nickelback-When We Stand Together.mp3',
            ],
            'Runaway' => [
                'artist' => 'Bon Jovi',
                'file'=>'Bon Jovi - Runaway.mp3',
            ],
            'Don’t Think I Could Forgive You' => [
                'artist' => 'Robin Berrygold',
                'file'=>'Robin Berrygold - Dont Think I Could Forgive You.mp3',
            ],
        ];
    }
}