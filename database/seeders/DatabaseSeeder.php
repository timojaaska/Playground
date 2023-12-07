<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Playground;
use App\Models\User;
use App\Models\Equipment;
use App\Models\PlaygroundEquipment;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = User::create([
        //     'email' => 'moi@example.com',
        //     'name' => 'Moi',
        //     'password' => bcrypt('passwd'),
        // ]);

        $user = User::create([
            'email' => 'test@account.com',
            'name' => 'TestiKäyttäjä',
             'password' => bcrypt('simosiili'),
          ]);
/*
        $user = User::create([
            'email' => 'admin@jaaska.fi',
            'name' => 'admin',
            'password' => bcrypt('karigrandi'),
        ]);

        // Tästä alkaa oikeat leikkikentät
        Playground::create([
            'name' => 'Aarnenkujan leikkikenttä',
            'location' => 'Aarnenkuja 6',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1755.0508415869322!2d24.51371166098719!3d63.90362223066445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e5c94864cc3%3A0xd746d222a892ace4!2sAarnenkuja%206%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701277231073!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Heittolantien leikkikenttä',
            'location' => 'Heittolantie 2',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.4552860596964!2d24.506404381691322!3d63.90997005628801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e59aa0c0e27%3A0x8f959ba803ac7a44!2sHeittolantie%202%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701272362713!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Paavontien leikkikenttä',
            'location' => 'Paavontie 16',
            'src' => 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d368.90734922262203!2d24.507583585551576!3d63.90716992382841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sPaavontien%20leikkikentt%C3%A4%2C%20Paavontie%2016!5e0!3m2!1sfi!2sfi!4v1701272455869!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Villenjärven leikkikenttä',
            'location' => 'Rantatie 2',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1043.7263129079947!2d24.49714489116803!3d63.899135349715735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e60e7548ecb%3A0x3157796f52e87a2b!2sRantatie%202%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701272673144!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Kaivokujan leikkikenttä',
            'location' => 'Kaivokuja 1',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1754.6825944731252!2d24.515923258209877!3d63.90951059687011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e5a15629981%3A0x2a9b7900e2bfb29e!2sKaivokuja%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701272762617!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Vaijeripuisto',
            'location' => 'Rinnekuja 12, 85410 Sievi',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.993837400563!2d24.53093071404838!3d63.892573146372726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812f7f44688083%3A0x674dfa8582f7d1bf!2sVaijeripuisto!5e0!3m2!1sfi!2sfi!4v1700466117776!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Iisakintien leikkikenttä',
            'location' => 'Iisakintie 2',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d219.40186184055915!2d24.524112710384706!3d63.90099888329812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e43a9a805f1%3A0xf5adc5b275e6d0d3!2sIisakintie%202%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701273379267!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Mustikkatien leikkikenttä',
            'location' => 'Mustikkatie 10',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7020.688261658784!2d24.482379763624103!3d63.90168376558522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e5e274aa0a5%3A0x3f2ff4dc7641801d!2sMustikkatie%2010%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701273459831!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Korhosen koulun leikkikenttä',
            'location' => 'Koulukatu 10',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1750.461970255182!2d24.281612076609488!3d63.97697833073437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4681282fe4a8f471%3A0x50cc028f618f97c8!2sKoulukatu%2010%2C%2085310%20Sievi!5e0!3m2!1sfi!2sfi!4v1701273543120!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Leppälän koulun leikkikenttä',
            'location' => 'Leppälänkouluntie 25',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d619.5630964374278!2d24.518299385361786!3d63.94617801876623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812f0d72303319%3A0xca43f92833fff664!2sLepp%C3%A4l%C3%A4nkouluntie%2025%2C%2085340%20Sievi!5e0!3m2!1sfi!2sfi!4v1701286468557!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Jyringin koulun leikkikenttä',
            'location' => 'Kylätie 47',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d737.2912630653386!2d24.423311902169218!3d63.92707513789684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812ecd90c74d23%3A0xe2572e38f49429b3!2sKyl%C3%A4tie%2047%2C%2085340%20Jyrinki!5e0!3m2!1sfi!2sfi!4v1701286542356!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Järvikylän koulun leikkikenttä',
            'location' => 'Raudaskyläntie 144',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1754.2212975287039!2d24.580024776604127!3d63.91688643575161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812fcdca97d379%3A0xa3e9cfd56de755d6!2sRaudaskyl%C3%A4ntie%20144%2C%2085430%20Sievi!5e0!3m2!1sfi!2sfi!4v1701286614243!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Jokikylän koulun leikkikenttä',
            'location' => 'Kajaanintie 1012',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d878.4576287163958!2d24.69827197870886!3d63.87380518914774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46813111de9827a1%3A0xc6bd039e55af6ba2!2sKajaanintie%201012%2C%2085450%20Joenkyl%C3%A4!5e0!3m2!1sfi!2sfi!4v1701286716888!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Kiiskilän koulun leikkikenttä',
            'location' => 'Kiiskilänkylätie 74',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.8117109310224!2d24.653191828958388!3d63.803983575611085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4681339be51748dd%3A0x5567e0a68267d965!2sKiiskil%C3%A4nkyl%C3%A4tie%2074%2C%2085470%20Sievi!5e0!3m2!1sfi!2sfi!4v1701286790267!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Lauri Haikolan koulun leikkikenttä',
            'location' => 'Jussintie 29',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9930.23941129747!2d24.51345527609452!3d63.8974806158332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e4218da2285%3A0x54a3ea96c484cf91!2sJussintie%2029%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701286931416!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Järvirinne päiväkodin leikkikenttä',
            'location' => 'Järvikyläntie 199',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1754.339960520158!2d24.584402676603975!3d63.91498913590998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812fd27891bc6f%3A0xc5a821a179e85aa7!2sJ%C3%A4rvikyl%C3%A4ntie%20199%2C%2085430%20Sievi!5e0!3m2!1sfi!2sfi!4v1701286996930!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Tuulihatun päiväkodin leikkikenttä',
            'location' => 'Rajalantie 5',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1755.1581030185687!2d24.516306276602837!3d63.90190703700189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e432c974ff3%3A0xe8bae43208051f8f!2sRajalantie%205%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701287047337!5m2!1sfi!2sfi',
        ]);

        Playground::create([
            'name' => 'Linnunlaulun päiväkodin leikkikenttä',
            'location' => 'Juolukkatie 10',
            'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1754.924510124367!2d24.498664176603164!3d63.90564233669017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46812e5f1086faf9%3A0x58c22745a8b43ed8!2sJuolukkatie%2010%2C%2085410%20Sievi!5e0!3m2!1sfi!2sfi!4v1701287121519!5m2!1sfi!2sfi',
        ]);

        // oikeet leikkikentät loppuu

        Equipment::create([
            'name' => 'Liukumäki',
        ]);

        Equipment::create([
            'name' => 'Polkuauto',
        ]);

        Equipment::create([
            'name' => 'Kiipeilyteline',
        ]);

        Equipment::create([
            'name' => 'Vaijeriliuku',
        ]);

        Equipment::create([
            'name' => 'Karuselli',
        ]);

        Equipment::create([
            'name' => 'Parikeinu',
        ]);

        Equipment::create([
            'name' => 'Kiikku',
        ]);

        PlaygroundEquipment::create([
            'playground_id' => '1',
            'equipment_id' => '1',
            'amount' => '1',
        ]);

        PlaygroundEquipment::create([
            'playground_id' => '2',
            'equipment_id' => '2',
            'amount' => '2',
        ]);

        PlaygroundEquipment::create([
            'playground_id' => '3',
            'equipment_id' => '3',
            'amount' => '3',   
        ]);

        PlaygroundEquipment::create([
            'playground_id' => '1',
            'equipment_id' => '2',
            'amount' => '2',
        ]);

        PlaygroundEquipment::create([
            'playground_id' => '2',
            'equipment_id' => '4',
            'amount' => '5',
        ]);

        PlaygroundEquipment::create([
            'playground_id' => '3',
            'equipment_id' => '5',
            'amount' => '8',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '5',
            'comment' => 'Leikkikenttä on todella viihtyisä paikka lapsille',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '5',
            'comment' => 'Leikkikenttä on hyvin hoidettu ja siisti.',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '4',
            'comment' => 'Leikkikenttä on turvallinen paikka lapsille leikkiä.',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '5',
            'comment' => 'Leikkikenttä on täynnä hauskoja leluja ja laitteita.',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '4',
            'comment' => 'Leikkikenttä on loistava paikka viettää aikaa perheen kanssa.',
        ]);

        Rating::create([
            'playground_id' => '2',
            'rating' => '4',
            'comment' => 'Leikkikenttä on erinomainen paikka lapsille oppia uusia taitoja.',
        ]);

        Rating::create([
            'playground_id' => '2',
            'rating' => '3',
            'comment' => 'Leikkikenttä on hyvin suunniteltu ja järjestetty.',
        ]);

        Rating::create([
            'playground_id' => '2',
            'rating' => '4',
            'comment' => 'Leikkikenttä on ihana paikka nauttia ulkoilmasta.',
        ]);

        Rating::create([
            'playground_id' => '2',
            'rating' => '5',
            'comment' => 'Leikkikenttä on paikka, jossa lapset voivat olla luovia ja keksiä uusia leikkejä.',
        ]);

        Rating::create([
            'playground_id' => '2',
            'rating' => '3',
            'comment' => 'Leikkipuisto on todella viihtyisä paikka lapsille ja aikuisille. Siellä on paljon erilaisia leikkivälineitä, jotka sopivat kaikenikäisille lapsille.',
        ]);

        Rating::create([
            'playground_id' => '3',
            'rating' => '2',
            'comment' => 'Leikkipuisto on hyvin hoidettu ja siisti. Siellä on aina mukavaa viettää aikaa.',
        ]);

        Rating::create([
            'playground_id' => '3',
            'rating' => '1',
            'comment' => 'Leikkipuisto on paikka, jossa lapset voivat olla luovia ja keksiä uusia leikkejä. Siellä on paljon erilaisia leikkivälineitä, jotka tarjoavat lapsille mahdollisuuden keksiä uusia leikkejä ja käyttää mielikuvitustaan.',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '5',
            'comment' => 'Leikkipuisto on täynnä hauskoja leluja ja laitteita. Siellä on paljon erilaisia leikkivälineitä, jotka tarjoavat monipuolisia leikkejä.',
        ]);

        Rating::create([
            'playground_id' => '2',
            'rating' => '4',
            'comment' => 'Leikkipuisto on loistava paikka viettää aikaa perheen kanssa. Siellä on paljon tilaa ja mukavia paikkoja istua ja rentoutua.',
        ]);

        Rating::create([
            'playground_id' => '1',
            'rating' => '4',
            'comment' => 'Leikkipuisto on erinomainen paikka lapsille oppia uusia taitoja. Siellä on paljon erilaisia leikkivälineitä, jotka kehittävät lasten motorisia taitoja ja luovuutta.',
        ]);
*/        

    }
}