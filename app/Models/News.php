<?php

namespace App\Models;

class News
{

    private Category $category;

    private array $news = [
        1 => [
            'id' => 1,
            'category_id' => 1,
            'category_name' => 'sport',
            'title' => 'Simona Halep has been handed a four year ban from tennis',
            'description' => 'Simona Halep has been suspended for four years following breaches of tennis anti-doping
                              programme',
            'text' => "ITIA: The tribunal accepted Halep's argument she had taken a contaminated supplement,
                       but determined the volume the player ingested could not have resulted in the concentration
                       of roxadustat found in the positive sample; Halep 'refuses to accept ban",
            'created_at' => '12-09-2023 20:25',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => "https://e0.365dm.com/22/10/1600x900/skysports-simona-halep-tennis_5938464.jpg?20221021145607",

            'author' => 'Richard Burnes'
        ],
        2 => [
            'id' => 2,
            'category_id' => 3,
            'category_name' => 'politic',
            'title' => 'McCarthy calls for formal impeachment',
            'description' => 'McCarthy calls for formal impeachment inquiry into Biden amid pressure from conservatives',
            'text' => "CNN — House Speaker Kevin McCarthy announced Tuesday he is calling on his committees to
                              open a formal impeachment inquiry into President Joe Biden, even as they have yet to prove
                              allegations he directly profited off his son’s foreign business deals",
            'created_at' => '12-09-2023 01:15',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://media.cnn.com/api/v1/images/stellar/prod/230912113412-02-kevin-mccarthy-091223.jpg?c=16x9&q=h_438,w_780,c_fill',

            'author' => 'John Johnes'
        ],
        3 => [
            'id' => 3,
            'category_id' => 2,
            'category_name' => 'business',
            'title' => 'Wall Street sees potential UAW strikes as manageable, with upsides',
            'description' => 'McCarthy calls for formal impeachment inquiry into Biden amid pressure from conservatives',
            'text' => "DETROIT – Many on Wall Street view potential strikes by United Auto Workers against the Detroit
                       automakers as largely manageable – even seeing investment opportunities. Some believe potential
                       strikes are already factored into the stocks, while others estimate General Motors, Ford Motor
                       and Stellantis, collectively known as the Detroit automakers, or D-3, can handle such work
                       stoppages and expected labor cost increases. The companies and the union are bargaining contracts
                       for 146,000 union members ahead of an 11:59 p.m. ET Thursday deadline.",
            'created_at' => '12-09-2023 10:50',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://image.cnbcfm.com/api/v1/image/106150803-1569513411855img_5217.jpg?v=1694530256&w=600&h=630&ffmt=webp&vtcrop=y',

            'author' => 'Michael Wayland'
        ],
        4 => [
            'id' => 4,
            'category_id' => 3,
            'category_name' => 'politic',
            'title' => 'Kenneth Chesebro, alleged architect of fake electors’ plot',
            'description' => 'Kenneth Chesebro, alleged architect of fake electors’ plot, followed Alex Jones around
                              Capitol grounds on January 6th',
            'text' => "CNN — When conspiracy theorist Alex Jones marched his way to the US Capitol on January 6, 2021,
                       riling up his legion of supporters, an unassuming middle-aged man in a red “Trump 2020” hat
                       conspicuously tagged along.
                       Videos and photographs reviewed by CNN show the man dutifully recording Jones with his phone as
                       the bombastic media personality ascended to the restricted area of the Capitol grounds where mobs
                       of then-President Donald Trump’s supporters eventually broke in.",
            'created_at' => '18-08-2023 03:15',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://media.cnn.com/api/v1/images/stellar/prod/230817181104-ken-chesebro.jpg?c=16x9&q=h_438,w_780,c_fill',

            'author' => 'Andrew Kaczynsky'
        ],
        5 => [
            'id' => 5,
            'category_id' => 4,
            'category_name' => 'life',
            'title' => 'As Simon Cowell shares positive therapy experience',
            'description' => 'As Simon Cowell shares positive therapy experience, how can it help even if you aren’t in
                              crisis?',
            'text' => "X Factor boss Simon Cowell, 63, has shared that having discovered therapy in the past year, he
                      feels as though “a weight has lifted off my shoulders”.
                      The music mogul, who is behind The X Factor and Britain’s Got Talent, said he wished he had seen a
                      therapist “10 or 20 years ago” in a recent interview with the Daily Mirror.
                      He also shared that the deaths of his parents and the coronavirus pandemic had affected his mental
                      health.",
            'created_at' => '31-08-2023 13:31',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://static.independent.co.uk/2023/08/31/13/31091941-8088a9d0-2a76-42e3-aa66-d3182c8e10ea.jpg?quality=75&width=990&crop=3%3A2%2Csmart&auto=webp',
            'author' => 'Imy Brighty-Potts'
        ],
        6 => [
            'id' => 6,
            'category_id' => 5,
            'category_name' => 'science',
            'title' => 'Filipino math teacher Emma Rotor helped develop crucial WWII weapons tech',
            'description' => 'Devoted wife of a famed Filipino writer, Emma Unson Rotor worked on the proximity fuze at
                              a U.S. agency in the 1940s.',
            'text' => "As an amateur historian studying Philippine-American history in Washington, D.C., I’ve long been
                      familiar with the story of Arturo Rotor and Emma Unson Rotor. The couple moved from the Philippines
                      to Baltimore in 1941 for graduate studies, but World War II disrupted their plans. Shortly after the
                      attack on Pearl Harbor, the Japanese invaded the Philippines, occupying it for three years.
                      The Philippine Commonwealth Government (the Philippines had not yet gained independence from the
                      United States) escaped to Washington in May 1942; Arturo joined the government in exile soon after.",
            'created_at' => '12-09-2023 15:31',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://www.sciencenews.org/wp-content/uploads/2023/08/070323_unsung_rotor_feat-1030x580.jpg',
            'author' => 'Erwin R. Tiongson'
        ],
        7 => [
            'id' => 7,
            'category_id' => 2,
            'category_name' => 'business',
            'title' => 'Cannabis ETFs boom after HHS recommendation to ease restrictions',
            'description' => 'Cannabis ETFs boom as HHS recommendation to ease restrictions raises hopes for federal
                              reform',
            'text' => "Marijuana-related ETFs are soaring in September as investors flood back into the sector after
                      months of waning interest.
                      The upswing in the funds, the most significant seen in recent years, stems from last month’s
                      recommendation by the U.S. Department of Health and Human Services to ease restrictions on
                      marijuana after a review of its classification under the Controlled Substances Act.
                      It marked a swift turnaround for a quasi-legal industry curtailed by the anemic pace of federal
                      reform. The spike caps several quarters of slow growth, and even losses, for some funds.",
            'created_at' => '12-09-2023 01:06',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://image.cnbcfm.com/api/v1/image/107298607-16944529402023-09-11t161302z_1060657368_rc2a63apglpd_rtrmadp_0_germany-cannabis.jpeg?v=1694538414&w=740&h=416&ffmt=webp&vtcrop=y',
            'author' => 'Stefan Sykes'
        ],
        8 => [
            'id' => 8,
            'category_id' => 1,
            'category_name' => 'sport',
            'title' => 'Scotland vs England',
            'description' => 'Scotland vs England LIVE! Commentary, report, analysis and live updates',
            'text' => "Nice bit of Man City vs Liverpool down the Scotland left tonight with Andrew Roberton, given full
                      licence to attack in this system, going up against Kyle Walker and Phil Foden.
                      This is a chance for Foden tonight to make a mark. In total across his 26 caps he’s managed just
                      three goals which works out at a goal every 500 minutes when analysing his actual game-time.
                      Criminal really for a player of his natural talent.
                      For context, Buakyo Saka averages a goal every 175 minutes in an England shirt.",
            'created_at' => '12-09-2023 21:06',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://liveblog.digitalimages.sky/lc-images-sky/lcimg-6bae1fc0-db3e-4e64-a8be-d3d75bce5f5b.png',
            'author' => 'Sam Blitz'
        ],
        9 => [
            'id' => 9,
            'category_id' => 5,
            'category_name' => 'science',
            'title' => 'Flashes in Venus’ atmosphere might be meteors, not lightning',
            'description' => 'Probes that will spend time in the planet’s clouds may not need protection from lightning',
            'text' => "Mysterious bursts of light in the atmosphere of Venus may be meteors burning up, a study suggests.",
            'created_at' => '11-09-2023 07:06',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://www.sciencenews.org/wp-content/uploads/2023/09/090623_sp_venus-lightning-meteors_feat-1030x580.jpg',
            'author' => 'KEVIN M. GILL'
        ],
        10 => [
            'id' => 10,
            'category_id' => 4,
            'category_name' => 'life',
            'title' => 'A day in the life of a Loch Ness Monster hunter',
            'description' => 'A day in the life of a Loch Ness Monster hunter and his search for the elusive creature',
            'text' => "A Loch Ness Monster enthusiast has given The Independent an exclusive glimpse into what a day
                      entails searching for the elusive creature.
                      Craig, who joined the biggest search in 50 years, has been camping down at the Loch Ness Bay
                      campsite and says just being a part of the historic event has made the weekend worthwhile.
                      He says: “I have not seen anything yet. There was a slight break in the water, but that was just
                      some waves in the middle of the lock.
                      Craig, who became interested in the Loch Ness Monster when he was a child, says he is fully equipped
                      and prepared for the bad weather.",
            'created_at' => '28-08-2023 10:06',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://static.independent.co.uk/2023/08/27/16/4bIVmTWa-720.jpg?quality=75&width=640&auto=webp',
            'author' => 'Billal Rahman'
        ],
        11 => [
            'id' => 11,
            'category_id' => 2,
            'category_name' => 'business',
            'title' => 'McDonald’s to start focus groups with owners as part of civil rights audit',
            'description' => 'McDonald’s will begin virtual focus groups with some owners and operators as a part of an
                              ongoing civil rights audit, according to a message to franchisees viewed by CNBC.',
            'text' => "McDonald’s will begin virtual focus groups with some owners and operators as a part of an
                      ongoing civil rights audit, according to a message to franchisees viewed by CNBC.
                      The fast food giant retained WilmerHale law firm to conduct the examination of its practices,
                      the memo said.
                      Last year, shareholders approved of a proposal by SOC Investment group to conduct a civil rights
                      audit in a close vote. At the time, SOC urged shareholders to back the measure ahead of the
                      company’s annual meeting, saying, McDonald’s plans do not adequately address the company’s civil
                      rights impact because it largely overlooks concerns with franchisees, which make up 95% of its
                      U.S. restaurants.",
            'created_at' => '29-07-2023 15:36',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://image.cnbcfm.com/api/v1/image/107278904-1690718984588-6T8A7784.jpg?v=1694462887&w=740&h=416&ffmt=webp&vtcrop=y',
            'author' => 'Adam Jeffery'
        ],
        12 => [
            'id' => 12,
            'category_id' => 3,
            'category_name' => 'politic',
            'title' => 'Tuberville’s Pentagon blockade and the shut-things-down view of government',
            'description' => 'It’s not every day you hear top officials at the Pentagon publicly accuse a US senator of
                             aiding communist states and enemies of the US.',
            'text' => "CNN — It’s not every day you hear top officials at the Pentagon publicly accuse a US senator of
                      aiding communist states and enemies of the US.
                      But that’s where we’ve arrived in today’s story of modern Washington; an old-time custom is being
                      used to grind the machinery of modern government to a halt as a senator takes a controversial
                      public stand in the culture wars.
                      The senator is Tommy Tuberville, the Alabama Republican known for making controversial statements.
                      The old time custom he’s exploiting is the informal Senate policy of allowing individual lawmakers to place “holds” on presidential nominations.
                      In the US military, where most service members move between jobs every few years, Tuberville’s
                      blanket hold has halted promotions and movement among general officers.
                      The culture war issue is abortion rights.",
            'created_at' => '06-09-2023 08:40',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://media.cnn.com/api/v1/images/stellar/prod/230906154748-01-tommy-tuberville-090623.jpg?c=16x9&q=h_720,w_1280,c_fill/f_webp',
            'author' => ' Zachary B. Wolf'
        ],
        13 => [
            'id' => 13,
            'category_id' => 1,
            'category_name' => 'sport',
            'title' => 'Euro 2024 Qualifying Hits & Misses: Brennan Johnson misfires for Wales - is the burden of Gareth
                        Bale an issue?',
            'description' => "In Adam Bate's brilliant breakdown of why Tottenham have signed Brennan Johnson, he wrote:
                             'The history of Johnson's career to date suggests that when a new challenge is put in front
                             of him, he soon makes the step up.'",
            'text' => "Well, a big challenge that faces him for Wales is stepping out of the shadows to fill the void
                      left by Gareth Bale. A daunting task but one that hasn't gone well so far.
                      Since Bale retired, Johnson has played 240 minutes for Wales but has failed to add to his record
                      of two goals from his 22 international caps.",
            'created_at' => '11-09-2023 22:39',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://e0.365dm.com/23/09/1600x900/skysports-brennan-johnson-wales_6281744.jpg?20230911221932',
            'author' => ' Stephen Kenny'
        ],
        14 => [
            'id' => 14,
            'category_id' => 5,
            'category_name' => 'science',
            'title' => 'Octopuses and squid are masters of RNA editing while leaving DNA intact',
            'description' => "These changes could explain the intelligence and flexibility of shell-less cephalopods",
            'text' => "Many writers grouse when an editor makes a change in a story, but the consequences of changing a
                      single word usually aren’t that dire.
                      Not so with genetic instructions for making proteins. Even a small change can prevent a protein
                      from doing its job properly, with possibly deadly consequences. Only occasionally is a change
                      beneficial. It seems wisest to preserve genetic instructions as they are written. Unless you’re an
                      octopus.
                      Octopuses are like aliens living among us — they do a lot of things differently from land animals,
                      or even other sea creatures. Their flexible tentacles taste what they touch and have minds of their
                      own. Octopuses’ eyes are color-blind, but their skin can detect light on its own (SN: 6/27/15, p. 10).
                      They are masters of disguise, changing color and skin textures to blend into their surroundings or
                      scare off rivals. And to a greater extent than most creatures, octopuses squirt the molecular
                      equivalent of red ink over their genetic instructions with astounding abandon, like a copy editor
                      run amok.",
            'created_at' => '19-05-2023 07:00',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://www.sciencenews.org/wp-content/uploads/2023/05/050623_cephalopods_feat-800x450.jpg',
            'author' => ' Tina Hesman Saey'
        ],
        15 => [
            'id' => 15,
            'category_id' => 4,
            'category_name' => 'life',
            'title' => 'Jason Mraz is feeling free and curious — in music and in love',
            'description' => "Two-time Grammy winner Jason Mraz released his latest album “Mystical Magical Rhythmical
                             Radical Ride” in June, a pop record that’s a turn from his balladeering, acoustic persona",
            'text' => "Jason Mraz is freer than ever, and that liberation has allowed his curiosity to get the best of
                      him — in the most optimistic ways.
                      Musically, the two-time Grammy winner released his latest album, “Mystical Magical Rhythmical
                      Radical Ride,” in June, a pop record that’s a turn from his balladeering, acoustic persona.",
            'created_at' => '25-08-2023 15:15',
            'status' => 'ACTIVE',
            'isPrivate' => 'false',
            'image' => 'https://static.independent.co.uk/2023/08/25/15/Jason_Mraz__Portrait_Session_09731.jpg?quality=75&width=990&height=614&fit=bounds&format=pjpg&crop=16%3A9%2Coffset-y0.5&auto=webp',
            'author' => 'Gary Gerard Hamilton'
        ],

    ];

    public function __construct(Category $category)
    {
        return $this->category = $category;
    }

    public function getNews(): array
    {
        return $this->news;
    }

    public function getNewsId($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return [$this->getNews()[$id]];
        }
        return null;
    }

}
