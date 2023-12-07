<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Kentän :attribute on oltava hyväksytty.',
    'accepted_if' => 'Kentän :attribute on oltava hyväksytty, kun :other on :value.',
    'active_url' => 'Kentän :attribute on oltava voimassa oleva URL.',
    'after' => 'Kentän :attribute on oltava päivämäärä :date jälkeen.',
    'after_or_equal' => 'Kentän :attribute on oltava päivämäärä :date jälkeen tai sama kuin :date.',
    'alpha' => 'Kenttä :attribute saa sisältää vain kirjaimia.',
    'alpha_dash' => 'Kenttä :attribute saa sisältää vain kirjaimia, numeroita, viivoja ja alaviivoja.',
    'alpha_num' => 'Kenttä :attribute saa sisältää vain kirjaimia ja numeroita.',
    'array' => 'Kentän :attribute on oltava taulukko.',
    'ascii' => 'Kentän :attribute saa sisältää vain yhden tavun ASCII-merkkejä ja symboleita.',
    'before' => 'Kentän :attribute on oltava päivämäärä ennen :date.',
    'before_or_equal' => 'Kentän :attribute on oltava päivämäärä ennen tai sama kuin :date.',
    'between' => [
        'array' => 'Kentän :attribute on oltava :min - :max alkion välillä.',
        'file' => 'Kentän :attribute on oltava :min - :max kilotavun välillä.',
        'numeric' => 'Kentän :attribute on oltava :min - :max välillä.',
        'string' => 'Kentän :attribute on oltava :min - :max merkin pituinen.',
    ],
    'boolean' => 'Kentän :attribute on oltava tosi tai epätosi.',
    'can' => 'Kenttä :attribute sisältää epäoikeutetun arvon.',
    'confirmed' => 'Kentän :attribute vahvistus ei vastaa.',
    'current_password' => 'Salasana on väärä.',
    'date' => 'Kentän :attribute on oltava päivämäärä.',
    'date_equals' => 'Kentän :attribute on oltava päivämäärä :date.',
    'date_format' => 'Kentän :attribute on oltava muodossa :format.',
    'decimal' => 'Kentän :attribute on oltava :decimal desimaalin tarkkuudella.',
    'declined' => 'Kentän :attribute on oltava hylätty.',
    'declined_if' => 'Kentän :attribute on oltava hylätty, kun :other on :value.',
    'different' => 'Kentän :attribute ja :other on oltava erilaiset.',
    'digits' => 'Kentän :attribute on oltava :digits numeroa pitkä.',
    'digits_between' => 'Kentän :attribute on oltava :min - :max numeroa pitkä.',
    'dimensions' => 'Kentän :attribute kuvan mitat ovat virheelliset.',
    'distinct' => 'Kentällä :attribute on kaksoiskappale.',
    'doesnt_end_with' => 'Kentän :attribute ei saa päättyä johonkin seuraavista: :values.',
    'doesnt_start_with' => 'Kentän :attribute ei saa alkaa jollakin seuraavista: :values.',
    'email' => 'Kentän :attribute on oltava voimassa oleva sähköpostiosoite.',
    'ends_with' => 'Kentän :attribute on päättyttävä johonkin seuraavista: :values.',
    'enum' => 'Valittu :attribute on virheellinen.',
    'exists' => 'Valittu :attribute on virheellinen.',
    'file' => 'Kentän :attribute on oltava tiedosto.',
    'filled' => 'Kentällä :attribute on oltava arvo.',
    'gt' => [
        'array' => 'Kentän :attribute on oltava yli :value alkion.',
        'file' => 'Kentän :attribute on oltava yli :value kilotavun.',
        'numeric' => 'Kentän :attribute on oltava suurempi kuin :value.',
        'string' => 'Kentän :attribute on oltava yli :value merkkiä pitkä.',
    ],
    'gte' => [
        'array' => 'Kentän :attribute on oltava :value alkion tai enemmän.',
        'file' => 'Kentän :attribute on oltava vähintään :value kilotavun.',
        'numeric' => 'Kentän :attribute on oltava vähintään :value.',
        'string' => 'Kentän :attribute on oltava vähintään :value merkkiä pitkä.',
    ],
    'image' => 'Kentän :attribute on oltava kuva.',
    'in' => 'Valittu :attribute on virheellinen.',
    'in_array' => 'Kentän :attribute on oltava olemassa kohteessa :other.',
    'integer' => 'Kentän :attribute on oltava kokonaisluku.',
    'ip' => 'Kentän :attribute on oltava voimassa oleva IP-osoite.',
    'ipv4' => 'Kentän :attribute on oltava voimassa oleva IPv4-osoite.',
    'ipv6' => 'Kentän :attribute on oltava voimassa oleva IPv6-osoite.',
    'json' => 'Kentän :attribute on oltava voimassa oleva JSON-merkkijono.',
    'lowercase' => 'Kentän :attribute on oltava pienaakkosia.',
    'lt' => [
        'array' => ':attribute-kentän tulee sisältää vähemmän kuin :value kohdetta.',
        'file' => ':attribute-kentän tulee olla alle :value kilotavua.',
        'numeric' => ':attribute-kentän tulee olla vähemmän kuin :value.',
        'string' => ':attribute-kentän tulee olla alle :value merkkiä.',
    ],
    'lte' => [
        'array' => ':attribute-kentällä ei saa olla enempää kuin :value kohdetta.',
        'file' => ':attribute-kentän tulee olla enintään :value kilotavua.',
        'numeric' => ':attribute-kentän tulee olla enintään :value.',
        'string' => ':attribute-kentän tulee olla enintään :value merkkiä.',
    ],
    'mac_address' => ':attribute-kentän tulee olla kelvollinen MAC-osoite.',
    'max' => [
        'array' => ':attribute-kentällä ei saa olla enempää kuin :max kohdetta.',
        'file' => ':attribute-kentän koko ei saa olla suurempi kuin :max kilotavua.',
        'numeric' => ':attribute-kentän arvo ei saa olla suurempi kuin :max.',
        'string' => ':attribute-kentän pituus ei saa olla suurempi kuin :max merkkiä.',
    ],
    'max_digits' => ':attribute-kentän ei tule sisältää enempää kuin :max numeroa.',
    'mimes' => ':attribute-kentän tulee olla tiedostotyyppiä: :values.',
    'mimetypes' => ':attribute-kentän tulee olla tiedostotyyppiä: :values.',
    'min' => [
        'array' => ':attribute-kentällä tulee olla vähintään :min kohdetta.',
        'file' => ':attribute-kentän tulee olla vähintään :min kilotavua.',
        'numeric' => ':attribute-kentän tulee olla vähintään :min.',
        'string' => ':attribute-kentän tulee olla vähintään :min merkkiä pitkä.',
    ],
    'min_digits' => ':attribute-kentän tulee sisältää vähintään :min numeroa.',
    'missing' => ':attribute-kenttä puuttuu.',
    'missing_if' => ':attribute-kenttä tulee olla poissa, kun :other on :value.',
    'missing_unless' => ':attribute-kenttä tulee olla poissa, ellei :other ole :value.',
    'missing_with' => ':attribute-kenttä tulee olla poissa, kun :values on läsnä.',
    'missing_with_all' => ':attribute-kenttä tulee olla poissa, kun :values ovat läsnä.',
    'multiple_of' => ':attribute-kentän tulee olla monikertainen arvolla :value.',
    'not_in' => 'Valittu :attribute ei kelpaa.',
    'not_regex' => ':attribute-kentän formaatti ei kelpaa.',
    'numeric' => ':attribute-kentän tulee olla numero.',
    'password' => [
        'letters' => ':attribute-kentän tulee sisältää vähintään yksi kirjain.',
        'mixed' => ':attribute-kentän tulee sisältää vähintään yksi iso ja yksi pieni kirjain.',
        'numbers' => ':attribute-kentän tulee sisältää vähintään yksi numero.',
        'symbols' => ':attribute-kentän tulee sisältää vähintään yksi erikoismerkki.',
        'uncompromised' => 'Annettu :attribute on esiintynyt tietovuodossa. Valitse toinen :attribute.',
    ],
    'present' => ':attribute-kentän tulee olla läsnä.',
    'prohibited' => ':attribute-kenttä on kielletty.',
    'prohibited_if' => ':attribute-kenttä on kielletty, kun :other on :value.',
    'prohibited_unless' => ':attribute-kenttä on kielletty, ellei :other ole :values joukossa.',
    'prohibits' => ':attribute-kenttä estää :otherin läsnäolon.',
    'regex' => ':attribute-kentän formaatti ei kelpaa.',
    'required' => 'Tämä kenttä on pakollinen.',
    'required_array_keys' => ':attribute-kentän tulee sisältää seuraavat kentät: :values.',
    'required_if' => ':attribute-kenttä vaaditaan, kun :other on :value.',
    'required_if_accepted' => ':attribute-kenttä vaaditaan, kun :other on hyväksytty.',
    'required_unless' => ':attribute-kenttä vaaditaan, ellei :other ole :values joukossa.',
    'required_with' => ':attribute-kenttä vaaditaan, kun :values on läsnä.',
    'required_with_all' => ':attribute-kenttä vaaditaan, kun :values ovat läsnä.',
    'required_without' => ':attribute-kenttä vaaditaan, kun :values ei ole läsnä.',
    'required_without_all' => ':attribute-kenttä vaaditaan, kun mikään :values ei ole läsnä.',
    'same' => ':attribute-kentän tulee olla sama kuin :other.',
    'size' => [
        'array' => ':attribute-kentän tulee sisältää :size kohdetta.',
        'file' => ':attribute-kentän tulee olla :size kilotavua.',
        'numeric' => ':attribute-kentän tulee olla :size.',
        'string' => ':attribute-kentän tulee olla :size merkkiä.',
    ],
    'starts_with' => ':attribute-kentän tulee alkaa seuraavista: :values.',
    'string' => ':attribute-kentän tulee olla merkkijono.',
    'timezone' => ':attribute-kentän tulee olla kelvollinen aikavyöhyke.',
    'unique' => ':attribute on jo otettu.',
    'uploaded' => ':attribute ei onnistunut lataamaan.',
    'uppercase' => ':attribute-kentän tulee olla isoilla kirjaimilla.',
    'url' => ':attribute-kentän tulee olla kelvollinen URL-osoite.',
    'ulid' => ':attribute-kentän tulee olla kelvollinen ULID.',
    'uuid' => ':attribute-kentän tulee olla kelvollinen UUID.',
    
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
