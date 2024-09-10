<?php         
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'crossfit-gym-pro'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {
	//array of all custom font types.
	$font_types = array( '' => '',
    'ABeeZee' => 'ABeeZee',
    'Abel' => 'Abel',
    'Abril Fatface' => 'Abril Fatface',
    'Aclonica' => 'Aclonica',
    'Acme' => 'Acme',
    'Actor' => 'Actor',
    'Adamina' => 'Adamina',
    'Advent Pro' => 'Advent Pro',
    'Aguafina Script' => 'Aguafina Script',
    'Akronim' => 'Akronim',
    'Aladin' => 'Aladin',
    'Aldrich' => 'Aldrich',
    'Alegreya' => 'Alegreya',
    'Alegreya Sans SC' => 'Alegreya Sans SC',
    'Alegreya SC' => 'Alegreya SC',
    'Alex Brush' => 'Alex Brush',
    'Alef' => 'Alef',
    'Alfa Slab One' => 'Alfa Slab One',
    'Alice' => 'Alice',
    'Alike' => 'Alike',
    'Alike Angular' => 'Alike Angular',
    'Allan' => 'Allan',
    'Allerta' => 'Allerta',
    'Allerta Stencil' => 'Allerta Stencil',
    'Allura' => 'Allura',
    'Almendra' => 'Almendra',
    'Almendra Display' => 'Almendra Display',
    'Almendra SC' => 'Almendra SC',
    'Amiri' => 'Amiri',
    'Amarante' => 'Amarante',
    'Amaranth' => 'Amaranth',
    'Amatic SC' => 'Amatic SC',
    'Amethysta' => 'Amethysta',
    'Amita' => 'Amita',
    'Anaheim' => 'Anaheim',
    'Andada' => 'Andada',
    'Andika' => 'Andika',
    'Annie Use Your Telescope' => 'Annie Use Your Telescope',
    'Anonymous Pro' => 'Anonymous Pro',
    'Antic' => 'Antic',
    'Antic Didone' => 'Antic Didone',
    'Antic Slab' => 'Antic Slab',
    'Anton' => 'Anton',
    'Angkor' => 'Angkor',
    'Arapey' => 'Arapey',
    'Arbutus' => 'Arbutus',
    'Arbutus Slab' => 'Arbutus Slab',
    'Architects Daughter' => 'Architects Daughter',
    'Archivo White' => 'Archivo White',
    'Archivo Narrow' => 'Archivo Narrow',
    'Arial' => 'Arial',
    'Arimo' => 'Arimo',
    'Arya' => 'Arya',
    'Arizonia' => 'Arizonia',
    'Armata' => 'Armata',
    'Artifika' => 'Artifika',
    'Arvo' => 'Arvo',
    'Asar' => 'Asar',
    'Asap' => 'Asap',
    'Asset' => 'Asset',
	'Assistant' => 'Assistant',
    'Astloch' => 'Astloch',
    'Asul' => 'Asul',
    'Atomic Age' => 'Atomic Age',
    'Aubrey' => 'Aubrey',
    'Audiowide' => 'Audiowide',
    'Autour One' => 'Autour One',
    'Average' => 'Average',
    'Average Sans' => 'Average Sans',
    'Averia Gruesa Libre' => 'Averia Gruesa Libre',
    'Averia Libre' => 'Averia Libre',
    'Averia Sans Libre' => 'Averia Sans Libre',
    'Averia Serif Libre' => 'Averia Serif Libre',
    'Battambang' => 'Battambang',
    'Bad Script' => 'Bad Script',
    'Bayon' => 'Bayon',
    'Balthazar' => 'Balthazar',
    'Bangers' => 'Bangers',
    'Basic' => 'Basic',
    'Baumans' => 'Baumans',
	'Big Shoulders Text' => 'Big Shoulders Text',
    'Belgrano' => 'Belgrano',
    'Belleza' => 'Belleza',
    'BenchNine' => 'BenchNine',
    'Bentham' => 'Bentham',
    'Berkshire Swash' => 'Berkshire Swash',
    'Bevan' => 'Bevan',
    'Bigelow Rules' => 'Bigelow Rules',
    'Bigshot One' => 'Bigshot One',
    'Bilbo' => 'Bilbo',
    'Bilbo Swash Caps' => 'Bilbo Swash Caps',
    'Biryani' => 'Biryani',
    'Bitter' => 'Bitter',
    'Black Ops One' => 'Black Ops One',
    'Bokor' => 'Bokor',
    'Bonbon' => 'Bonbon',
    'Boogaloo' => 'Boogaloo',
    'Bowlby One' => 'Bowlby One',
    'Bowlby One SC' => 'Bowlby One SC',
    'Brawler' => 'Brawler',
    'Bree Serif' => 'Bree Serif',
    'Bubblegum Sans' => 'Bubblegum Sans',
    'Bubbler One' => 'Bubbler One',
    'Buda' => 'Buda',
    'Buenard' => 'Buenard',
    'Butcherman' => 'Butcherman',
    'Butcherman Caps' => 'Butcherman Caps',
    'Butterfly Kids' => 'Butterfly Kids',
    'Cabin' => 'Cabin',
    'Cabin Condensed' => 'Cabin Condensed',
    'Cabin Sketch' => 'Cabin Sketch',
    'Cabin' => 'Cabin',
    'Caesar Dressing' => 'Caesar Dressing',
    'Cagliostro' => 'Cagliostro',
    'Calligraffitti' => 'Calligraffitti',
    'Cambay' => 'Cambay',
    'Cambo' => 'Cambo',
    'Candal' => 'Candal',
    'Cantarell' => 'Cantarell',
    'Cantata One' => 'Cantata One',
    'Cantora One' => 'Cantora One',
    'Capriola' => 'Capriola',
    'Cardo' => 'Cardo',
    'Carme' => 'Carme',
    'Carrois Gothic' => 'Carrois Gothic',
    'Carrois Gothic SC' => 'Carrois Gothic SC',
    'Carter One' => 'Carter One',
    'Caveat' => 'Caveat',
    'Caveat Brush' => 'Caveat Brush',
    'Catamaran' => 'Catamaran',
    'Caudex' => 'Caudex',
    'Cedarville Cursive' => 'Cedarville Cursive',
    'Ceviche One' => 'Ceviche One',
    'Changa One' => 'Changa One',
    'Chango' => 'Chango',
    'Chau Philomene One' => 'Chau Philomene One',
    'Chenla' => 'Chenla',
    'Chela One' => 'Chela One',
    'Chelsea Market' => 'Chelsea Market',
    'Cherry Cream Soda' => 'Cherry Cream Soda',
    'Cherry Swash' => 'Cherry Swash',
    'Chewy' => 'Chewy',
    'Chicle' => 'Chicle',
    'Chivo' => 'Chivo',
    'Chonburi' => 'Chonburi',
    'Cinzel' => 'Cinzel',
    'Cinzel Decorative' => 'Cinzel Decorative',
    'Clicker Script' => 'Clicker Script',
    'Coda' => 'Coda',
    'Codystar' => 'Codystar',
    'Combo' => 'Combo',
    'Comfortaa' => 'Comfortaa',
    'Coming Soon' => 'Coming Soon',
    'Condiment' => 'Condiment',
    'Content' => 'Content',
    'Contrail One' => 'Contrail One',
    'Convergence' => 'Convergence',
    'Cookie' => 'Cookie',
    'Comic Sans MS' => 'Comic Sans MS',
    'Copse' => 'Copse',
    'Corben' => 'Corben',
    'Courgette' => 'Courgette',
    'Cousine' => 'Cousine',
    'Coustard' => 'Coustard',
    'Covered By Your Grace' => 'Covered By Your Grace',
    'Crafty Girls' => 'Crafty Girls',
    'Creepster' => 'Creepster',
    'Creepster Caps' => 'Creepster Caps',
    'Crete Round' => 'Crete Round',
    'Crimson' => 'Crimson',
    'Croissant One' => 'Croissant One',
    'Crushed' => 'Crushed',
    'Cuprum' => 'Cuprum',
    'Cutive' => 'Cutive',
    'Cutive Mono' => 'Cutive Mono',
    'Damion' => 'Damion',
    'Dangrek' => 'Dangrek',
    'Dancing Script' => 'Dancing Script',
    'Dawning of a New Day' => 'Dawning of a New Day',
    'Days One' => 'Days One',
    'Dekko' => 'Dekko',
    'Delius' => 'Delius',
    'Delius Swash Caps' => 'Delius Swash Caps',
    'Delius Unicase' => 'Delius Unicase',
    'Della Respira' => 'Della Respira',
    'Denk One' => 'Denk One',
    'Devonshire' => 'Devonshire',
    'Dhurjati' => 'Dhurjati',
    'Didact Gothic' => 'Didact Gothic',
    'Diplomata' => 'Diplomata',
    'Diplomata SC' => 'Diplomata SC',
    'Domine' => 'Domine',
    'Donegal One' => 'Donegal One',
    'Doppio One' => 'Doppio One',
    'Dorsa' => 'Dorsa',
    'Dosis' => 'Dosis',
    'Dr Sugiyama' => 'Dr Sugiyama',
    'Droid Sans' => 'Droid Sans',
    'Droid Sans Mono' => 'Droid Sans Mono',
    'Droid Serif' => 'Droid Serif',
    'Duru Sans' => 'Duru Sans',
    'Dynalight' => 'Dynalight',
    'EB Garamond' => 'EB Garamond',
    'Eczar' => 'Eczar',
    'Eagle Lake' => 'Eagle Lake',
    'Eater' => 'Eater',
    'Eater Caps' => 'Eater Caps',
    'Economica' => 'Economica',
    'Ek Mukta' => 'Ek Mukta',
    'Electrolize' => 'Electrolize',
    'Elsie' => 'Elsie',
    'Elsie Swash Caps' => 'Elsie Swash Caps',
    'Emblema One' => 'Emblema One',
    'Emilys Candy' => 'Emilys Candy',
    'Engagement' => 'Engagement',
    'Englebert' => 'Englebert',
    'Enriqueta' => 'Enriqueta',
    'Erica One' => 'Erica One',
    'Esteban' => 'Esteban',
    'Euphoria Script' => 'Euphoria Script',
    'Ewert' => 'Ewert',
    'Exo' => 'Exo',
    'Exo 2' => 'Exo 2',
    'Expletus Sans' => 'Expletus Sans',
    'Fanwood Text' => 'Fanwood Text',
    'Fascinate' => 'Fascinate',
    'Fascinate Inline' => 'Fascinate Inline',
    'Fasthand' => 'Fasthand',
    'Faster One' => 'Faster One',
    'Federant' => 'Federant',
    'Federo' => 'Federo',
    'Felipa' => 'Felipa',
    'Fenix' => 'Fenix',
    'Finger Paint' => 'Finger Paint',
    'Fira Mono' => 'Fira Mono',
    'Fira Sans' => 'Fira Sans',
    'Fjalla One' => 'Fjalla One',
    'Fjord One' => 'Fjord One',
    'Flamenco' => 'Flamenco',
    'Flavors' => 'Flavors',
    'Fondamento' => 'Fondamento',
    'Fontdiner Swanky' => 'Fontdiner Swanky',
    'Forum' => 'Forum',
    'Francois One' => 'Francois One',
    'FreeSans' => 'FreeSans',

    'Freckle Face' => 'Freckle Face',
    'Fredericka the Great' => 'Fredericka the Great',
    'Fredoka One' => 'Fredoka One',
    'Fresca' => 'Fresca',
    'Freehand' => 'Freehand',
    'Frijole' => 'Frijole',
    'Fruktur' => 'Fruktur',
    'Fugaz One' => 'Fugaz One',
    'Gafata' => 'Gafata',
    'Galdeano' => 'Galdeano',
    'Galindo' => 'Galindo',
    'Gentium Basic' => 'Gentium Basic',
    'Gentium Book Basic' => 'Gentium Book Basic',
    'Geo' => 'Geo',
    'Georgia' => 'Georgia',
    'Geostar' => 'Geostar',
    'Geostar Fill' => 'Geostar Fill',
    'Germania One' => 'Germania One',
    'Gilda Display' => 'Gilda Display',
    'Give You Glory' => 'Give You Glory',
    'Glass Antiqua' => 'Glass Antiqua',
    'Glegoo' => 'Glegoo',
    'Gloria Hallelujah' => 'Gloria Hallelujah',
    'Goblin One' => 'Goblin One',
    'Gochi Hand' => 'Gochi Hand',
    'Gorditas' => 'Gorditas',
    'Gurajada' => 'Gurajada',
    'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
    'Graduate' => 'Graduate',
    'Grand Hotel' => 'Grand Hotel',
    'Gravitas One' => 'Gravitas One',
    'Great Vibes' => 'Great Vibes',
    'Griffy' => 'Griffy',
    'Gruppo' => 'Gruppo',
    'Gudea' => 'Gudea',
    'Gidugu' => 'Gidugu',
    'GFS Didot' => 'GFS Didot',
    'GFS Neohellenic' => 'GFS Neohellenic',
    'Habibi' => 'Habibi',
    'Hammersmith One' => 'Hammersmith One',
    'Halant' => 'Halant',
    'Hanalei' => 'Hanalei',
    'Hanalei Fill' => 'Hanalei Fill',
    'Handlee' => 'Handlee',
    'Hanuman' => 'Hanuman',
    'Happy Monkey' => 'Happy Monkey',
    'Headland One' => 'Headland One',
    'Henny Penny' => 'Henny Penny',
    'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
    'Hind' => 'Hind',
    'Hind Siliguri' => 'Hind Siliguri',
    'Hind Vadodara' => 'Hind Vadodara',
    'Holtwood One SC' => 'Holtwood One SC',
    'Homemade Apple' => 'Homemade Apple',
    'Homenaje' => 'Homenaje',
    'IM Fell' => 'IM Fell',
    'Itim' => 'Itim',
    'Iceberg' => 'Iceberg',
    'Iceland' => 'Iceland',
    'Imprima' => 'Imprima',
    'Inconsolata' => 'Inconsolata',
    'Inder' => 'Inder',
    'Indie Flower' => 'Indie Flower',
    'Inknut Antiqua' => 'Inknut Antiqua',
    'Inika' => 'Inika',
    'Irish Growler' => 'Irish Growler',
    'Istok Web' => 'Istok Web',
    'Italiana' => 'Italiana',
    'Italianno' => 'Italianno',
    'Jacques Francois' => 'Jacques Francois',
    'Jacques Francois Shadow' => 'Jacques Francois Shadow',
    'Jim Nightshade' => 'Jim Nightshade',
    'Jockey One' => 'Jockey One',
    'Jaldi' => 'Jaldi',
    'Jolly Lodger' => 'Jolly Lodger',
    'Josefin Sans' => 'Josefin Sans',
    'Josefin Sans' => 'Josefin Sans',
    'Josefin Slab' => 'Josefin Slab',
    'Joti One' => 'Joti One',
    'Judson' => 'Judson',
    'Julee' => 'Julee',
    'Julius Sans One' => 'Julius Sans One',
    'Junge' => 'Junge',
    'Jura' => 'Jura',
    'Just Another Hand' => 'Just Another Hand',
    'Just Me Again Down Here' => 'Just Me Again Down Here',
    'Kadwa' => 'Kadwa',
    'Kdam Thmor' => 'Kdam Thmor',
    'Kalam' => 'Kalam', 
    'Kameron' => 'Kameron',
    'Kantumruy' => 'Kantumruy',
    'Karma' => 'Karma',
    'Karla' => 'Karla',
    'Kaushan Script' => 'Kaushan Script',
    'Kavoon' => 'Kavoon',
    'Keania One' => 'Keania One',
    'Kelly Slab' => 'Kelly Slab',
    'Kenia' => 'Kenia',
    'Khand' => 'Khand',
    'Khmer' => 'Khmer',
    'Khula' => 'Khula',
    'Kite One' => 'Kite One',
    'Knewave' => 'Knewave',
    'Kotta One' => 'Kotta One',
    'Kranky' => 'Kranky',
    'Kreon' => 'Kreon',
    'Kristi' => 'Kristi',
    'Koulen' => 'Koulen',
    'Krona One' => 'Krona One',
    'Kurale' => 'Kurale',
    'Lakki Reddy' => 'Lakki Reddy',
    'La Belle Aurore' => 'La Belle Aurore',
    'Lancelot' => 'Lancelot',
    'Laila' => 'Laila',
    'Lato' => 'Lato',
    'Lateef' => 'Lateef',
    'League Script' => 'League Script',
    'Leckerli One' => 'Leckerli One',
    'Ledger' => 'Ledger',
    'Lekton' => 'Lekton',
    'Lemon' => 'Lemon',
    'Libre Baskerville' => 'Libre Baskerville',
    'Life Savers' => 'Life Savers',
    'Lilita One' => 'Lilita One',
    'Limelight' => 'Limelight',
    'Linden Hill' => 'Linden Hill',
    'Lobster' => 'Lobster',
    'Lobster Two' => 'Lobster Two',
    'Londrina Outline' => 'Londrina Outline',
    'Londrina Shadow' => 'Londrina Shadow',
    'Londrina Sketch' => 'Londrina Sketch',
    'Londrina Solid' => 'Londrina Solid',
    'Lora' => 'Lora',
    'Love Ya Like A Sister' => 'Love Ya Like A Sister',
    'Loved by the King' => 'Loved by the King',
    'Lovers Quarrel' => 'Lovers Quarrel',
    'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    'Luckiest Guy' => 'Luckiest Guy',
    'Lusitana' => 'Lusitana',
    'Lustria' => 'Lustria',
    'Macondo' => 'Macondo',
    'Macondo Swash Caps' => 'Macondo Swash Caps',
    'Magra' => 'Magra',
    'Maiden Orange' => 'Maiden Orange',
    'Mallanna' => 'Mallanna',
    'Mandali' => 'Mandali',
    'Mako' => 'Mako',
    'Marcellus' => 'Marcellus',
    'Marcellus SC' => 'Marcellus SC',
    'Marck Script' => 'Marck Script',
    'Margarine' => 'Margarine',
    'Marko One' => 'Marko One',
    'Marmelad' => 'Marmelad',
    'Marvel' => 'Marvel',
    'Martel' => 'Martel',
    'Martel Sans' => 'Martel Sans',
    'Mate' => 'Mate',
    'Mate SC' => 'Mate SC',
    'Maven Pro' => 'Maven Pro',
    'McLaren' => 'McLaren',
    'Meddon' => 'Meddon',
    'MedievalSharp' => 'MedievalSharp',
    'Medula One' => 'Medula One',
    'Megrim' => 'Megrim',
    'Meie Script' => 'Meie Script',
    'Merienda' => 'Merienda',
    'Merienda One' => 'Merienda One',
    'Merriweather' => 'Merriweather',
    'Metal' => 'Metal',
    'Metal Mania' => 'Metal Mania',
    'Metamorphous' => 'Metamorphous',
    'Metrophobic' => 'Metrophobic',
    'Michroma' => 'Michroma',
    'Milonga' => 'Milonga',
    'Miltonian' => 'Miltonian',
    'Miltonian Tattoo' => 'Miltonian Tattoo',
    'Miniver' => 'Miniver',
    'Miss Fajardose' => 'Miss Fajardose',
    'Miss Saint Delafield' => 'Miss Saint Delafield',
    'Modak' => 'Modak',
    'Modern Antiqua' => 'Modern Antiqua',
    'Molengo' => 'Molengo',
    'Molle' => 'Molle',
    'Moulpali' => 'Moulpali',
    'Monda' => 'Monda',
    'Monofett' => 'Monofett',
    'Monoton' => 'Monoton',
    'Monsieur La Doulaise' => 'Monsieur La Doulaise',
    'Montaga' => 'Montaga',
    'Montez' => 'Montez',
    'Montserrat' => 'Montserrat',
    'Montserrat Alternates' => 'Montserrat Alternates',
    'Montserrat Subrayada' => 'Montserrat Subrayada',
    'Mountains of Christmas' => 'Mountains of Christmas',
    'Mouse Memoirs' => 'Mouse Memoirs',
    'Moul' => 'Moul',
    'Mr Bedford' => 'Mr Bedford',
    'Mr Bedfort' => 'Mr Bedfort',
    'Mr Dafoe' => 'Mr Dafoe',
    'Mr De Haviland' => 'Mr De Haviland',
    'Mrs Saint Delafield' => 'Mrs Saint Delafield',
    'Mrs Sheppards' => 'Mrs Sheppards',
    'Muli' => 'Muli',
    'Mystery Quest' => 'Mystery Quest',
    'Neucha' => 'Neucha',
    'Neuton' => 'Neuton',
    'New Rocker' => 'New Rocker',
    'News Cycle' => 'News Cycle',
    'Niconne' => 'Niconne',
    'Nixie One' => 'Nixie One',
    'Nobile' => 'Nobile',
    'Nokora' => 'Nokora',
    'Norican' => 'Norican',
    'Nosifer' => 'Nosifer',
    'Nosifer Caps' => 'Nosifer Caps',
    'Nova Mono' => 'Nova Mono',
    'Noticia Text' => 'Noticia Text',
    'Noto Sans' => 'Noto Sans',
    'Noto Serif' => 'Noto Serif',
    'Nova Round' => 'Nova Round',
    'Numans' => 'Numans',
    'Nunito' => 'Nunito',
    'NTR' => 'NTR',
    'Offside' => 'Offside',
    'Oldenburg' => 'Oldenburg',
    'Oleo Script' => 'Oleo Script',
    'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
    'Open Sans' => 'Open Sans',
    'Open Sans Condensed' => 'Open Sans Condensed',
    'Oranienbaum' => 'Oranienbaum',
    'Orbitron' => 'Orbitron',
    'Odor Mean Chey' => 'Odor Mean Chey',
    'Oregano' => 'Oregano',
    'Orienta' => 'Orienta',
    'Original Surfer' => 'Original Surfer',
    'Oswald' => 'Oswald',
    'Over the Rainbow' => 'Over the Rainbow',
    'Overlock' => 'Overlock',
    'Overlock SC' => 'Overlock SC',
    'Ovo' => 'Ovo',
    'Oxygen' => 'Oxygen',
    'Oxygen Mono' => 'Oxygen Mono',
    'Palanquin Dark' => 'Palanquin Dark',
    'Peddana' => 'Peddana',
    'Poppins' => 'Poppins',
    'PT Mono' => 'PT Mono',
    'PT Sans' => 'PT Sans',
    'PT Sans Caption' => 'PT Sans Caption',
    'PT Sans Narrow' => 'PT Sans Narrow',
    'PT Serif' => 'PT Serif',
    'PT Serif Caption' => 'PT Serif Caption',
    'Pacifico' => 'Pacifico',
    'Paprika' => 'Paprika',
    'Parisienne' => 'Parisienne',
    'Passero One' => 'Passero One',
    'Passion One' => 'Passion One',
    'Patrick Hand' => 'Patrick Hand',
    'Patrick Hand SC' => 'Patrick Hand SC',
    'Patua One' => 'Patua One',
    'Paytone One' => 'Paytone One',
    'Peralta' => 'Peralta',
    'Permanent Marker' => 'Permanent Marker',
    'Petit Formal Script' => 'Petit Formal Script',
    'Petrona' => 'Petrona',
    'Philosopher' => 'Philosopher',
    'Piedra' => 'Piedra',
    'Pinyon Script' => 'Pinyon Script',
    'Pirata One' => 'Pirata One',
    'Plaster' => 'Plaster',
    'Palatino Linotype' => 'Palatino Linotype',
    'Play' => 'Play',
    'Playball' => 'Playball',
    'Playfair Display' => 'Playfair Display',
    'Playfair Display SC' => 'Playfair Display SC',
    'Podkova' => 'Podkova',
    'Poiret One' => 'Poiret One',
    'Poller One' => 'Poller One',
    'Poly' => 'Poly',
    'Pompiere' => 'Pompiere',
    'Pontano Sans' => 'Pontano Sans',
    'Port Lligat Sans' => 'Port Lligat Sans',
    'Port Lligat Slab' => 'Port Lligat Slab',
    'Prata' => 'Prata',
    'Pragati Narrow' => 'Pragati Narrow',
    'Preahvihear' => 'Preahvihear',
    'Press Start 2P' => 'Press Start 2P',
    'Princess Sofia' => 'Princess Sofia',
    'Prociono' => 'Prociono',
    'Prosto One' => 'Prosto One',
    'Puritan' => 'Puritan',
    'Purple Purse' => 'Purple Purse',
    'Quando' => 'Quando',
    'Quantico' => 'Quantico',
    'Quattrocento' => 'Quattrocento',
    'Quattrocento Sans' => 'Quattrocento Sans',
    'Questrial' => 'Questrial',
    'Quicksand' => 'Quicksand',
    'Quintessential' => 'Quintessential',
    'Qwigley' => 'Qwigley',
    'Racing Sans One' => 'Racing Sans One',
    'Radley' => 'Radley',
    'Rajdhani' => 'Rajdhani',
    'Raleway Dots' => 'Raleway Dots',
    'Raleway' => 'Raleway',
    'Rambla' => 'Rambla',
    'Ramabhadra' => 'Ramabhadra',
    'Ramaraja' => 'Ramaraja',
    'Rammetto One' => 'Rammetto One',
    'Ranchers' => 'Ranchers',
    'Rancho' => 'Rancho',
    'Ranga' => 'Ranga',
    'Ravi Prakash' => 'Ravi Prakash',
    'Rationale' => 'Rationale',
    'Redressed' => 'Redressed',
    'Reenie Beanie' => 'Reenie Beanie',
    'Revalia' => 'Revalia',
    'Rhodium Libre' => 'Rhodium Libre',
    'Ribeye' => 'Ribeye',
    'Ribeye Marrow' => 'Ribeye Marrow',
    'Righteous' => 'Righteous',
    'Risque' => 'Risque',
    'Roboto' => 'Roboto',
    'Roboto Condensed' => 'Roboto Condensed',
    'Roboto Mono' => 'Roboto Mono',
    'Roboto Slab' => 'Roboto Slab',
    'Rochester' => 'Rochester',
    'Rock Salt' => 'Rock Salt',
    'Rokkitt' => 'Rokkitt',
    'Romanesco' => 'Romanesco',
    'Ropa Sans' => 'Ropa Sans',
    'Rosario' => 'Rosario',
    'Rosarivo' => 'Rosarivo',
    'Rouge Script' => 'Rouge Script',
    'Rozha One' => 'Rozha One',
    'Rubik' => 'Rubik',
    'Rubik One' => 'Rubik One',
    'Rubik Mono One' => 'Rubik Mono One',
    'Ruda' => 'Ruda',
    'Rufina' => 'Rufina',
    'Ruge Boogie' => 'Ruge Boogie',
    'Ruluko' => 'Ruluko',
    'Rum Raisin' => 'Rum Raisin',
    'Ruslan Display' => 'Ruslan Display',
    'Russo One' => 'Russo One',
    'Ruthie' => 'Ruthie',
    'Rye' => 'Rye',
    'Sacramento' => 'Sacramento',
    'Sail' => 'Sail',
    'Salsa' => 'Salsa',
    'Sanchez' => 'Sanchez',
    'Sancreek' => 'Sancreek',
    'Sahitya' => 'Sahitya',
    'Sansita One' => 'Sansita One',
    'Sarpanch' => 'Sarpanch',
    'Sarina' => 'Sarina',
    'Satisfy' => 'Satisfy',
    'Scada' => 'Scada',
    'Scheherazade' => 'Scheherazade',
    'Schoolbell' => 'Schoolbell',
    'Seaweed Script' => 'Seaweed Script',
    'Sarala' => 'Sarala',
    'Sevillana' => 'Sevillana',
    'Seymour One' => 'Seymour One',
    'Shadows Into Light' => 'Shadows Into Light',
    'Shadows Into Light Two' => 'Shadows Into Light Two',
    'Shanti' => 'Shanti',
    'Share' => 'Share',
    'Share Tech' => 'Share Tech',
    'Share Tech Mono' => 'Share Tech Mono',
    'Shojumaru' => 'Shojumaru',
    'Short Stack' => 'Short Stack',
    'Sigmar One' => 'Sigmar One',
    'Suranna' => 'Suranna',
    'Suravaram' => 'Suravaram',
    'Suwannaphum' => 'Suwannaphum',
    'Signika' => 'Signika',
    'Signika Negative' => 'Signika Negative',
    'Simonetta' => 'Simonetta',
    'Siemreap' => 'Siemreap',
    'Sirin Stencil' => 'Sirin Stencil',
    'Six Caps' => 'Six Caps',
    'Skranji' => 'Skranji',
    'Slackey' => 'Slackey',
    'Smokum' => 'Smokum',
    'Smythe' => 'Smythe',
    'Sniglet' => 'Sniglet',
    'Snippet' => 'Snippet',
    'Snowburst One' => 'Snowburst One',
    'Sofadi One' => 'Sofadi One',
    'Sofia' => 'Sofia',
    'Sonsie One' => 'Sonsie One',
    'Sorts Mill Goudy' => 'Sorts Mill Goudy',
    'Sorts Mill Goudy' => 'Sorts Mill Goudy',
    'Source Code Pro' => 'Source Code Pro',
    'Source Sans Pro' => 'Source Sans Pro',
    'Special I am one' => 'Special I am one',
    'Spicy Rice' => 'Spicy Rice',
    'Spinnaker' => 'Spinnaker',
    'Spirax' => 'Spirax',
    'Squada One' => 'Squada One',
    'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
    'Stalemate' => 'Stalemate',
    'Stalinist One' => 'Stalinist One',
    'Stardos Stencil' => 'Stardos Stencil',
    'Stint Ultra Condensed' => 'Stint Ultra Condensed',
    'Stint Ultra Expanded' => 'Stint Ultra Expanded',
    'Stoke' => 'Stoke',
    'Stoke' => 'Stoke',
    'Strait' => 'Strait',
    'Sura' => 'Sura',
    'Sumana' => 'Sumana',
    'Sue Ellen Francisco' => 'Sue Ellen Francisco',
    'Sunshiney' => 'Sunshiney',
    'Supermercado One' => 'Supermercado One',
    'Swanky and Moo Moo' => 'Swanky and Moo Moo',
    'Syncopate' => 'Syncopate',
    'Symbol' => 'Symbol',
    'Timmana' => 'Timmana',
    'Taprom' => 'Taprom',
    'Tangerine' => 'Tangerine',
    'Tahoma' => 'Tahoma',
    'Teko' => 'Teko',
    'Telex' => 'Telex',
    'Tenali Ramakrishna' => 'Tenali Ramakrishna',
    'Tenor Sans' => 'Tenor Sans',
    'Terminal Dosis' => 'Terminal Dosis',
    'Terminal Dosis Light' => 'Terminal Dosis Light',
    'Text Me One' => 'Text Me One',
    'The Girl Next Door' => 'The Girl Next Door',
    'Tienne' => 'Tienne',
    'Tillana' => 'Tillana',
    'Tinos' => 'Tinos',
    'Titan One' => 'Titan One',
    'Titillium Web' => 'Titillium Web',
    'Trade Winds' => 'Trade Winds',
    'Trebuchet MS' => 'Trebuchet MS',
    'Trocchi' => 'Trocchi',
    'Trochut' => 'Trochut',
    'Trykker' => 'Trykker',
    'Tulpen One' => 'Tulpen One',
    'Ubuntu' => 'Ubuntu',
    'Ubuntu Condensed' => 'Ubuntu Condensed',
    'Ubuntu Mono' => 'Ubuntu Mono',
    'Ultra' => 'Ultra',
    'Uncial Antiqua' => 'Uncial Antiqua',
    'Underdog' => 'Underdog',
    'Unica One' => 'Unica One',
    'UnifrakturCook' => 'UnifrakturCook',
    'UnifrakturMaguntia' => 'UnifrakturMaguntia',
    'Unkempt' => 'Unkempt',
    'Unlock' => 'Unlock',
    'Unna' => 'Unna',
    'VT323' => 'VT323',
    'Vampiro One' => 'Vampiro One',
    'Varela' => 'Varela',
    'Varela Round' => 'Varela Round',
    'Vast Shadow' => 'Vast Shadow',
    'Vesper Libre' => 'Vesper Libre',
    'Verdana' => 'Verdana',
    'Vibur' => 'Vibur',
    'Vidaloka' => 'Vidaloka',
    'Viga' => 'Viga',
    'Voces' => 'Voces',
    'Volkhov' => 'Volkhov',
    'Vollkorn' => 'Vollkorn',
    'Voltaire' => 'Voltaire',
    'Waiting for the Sunrise' => 'Waiting for the Sunrise',
    'Wallpoet' => 'Wallpoet',
    'Walter Turncoat' => 'Walter Turncoat',
    'Warnes' => 'Warnes',
    'Wellfleet' => 'Wellfleet',
    'Wendy One' => 'Wendy One',
    'Wire One' => 'Wire One',
    'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    'Yantramanav' => 'Yantramanav',
    'Yellowtail' => 'Yellowtail',
    'Yeseva One' => 'Yeseva One',
    'Yesteryear' => 'Yesteryear',
    'Zeyada' => 'Zeyada'
  );

	//array of all font sizes.
	$font_sizes = array( 
		'10px' => '10px',
		'11px' => '11px',
	);
	
	$options = array();
	$imagepath =  get_template_directory_uri() . '/images/';

	
	for($n=12;$n<=200;$n+=1){
		$font_sizes[$n.'px'] = $n.'px';
	}
	
	// Pull all the pages into an array
	 $options_pages = array();
	 $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	 $options_pages[''] = 'Select a page:';
	 foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	 }

	// array of section content.
	$section_text = array(	
		1 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section1',
			'titlecolor'	=> '#282828',
			'bgcolor' 		=> '#fefefe',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row][column_content type="left-column-50"][why-choose-image image="'.get_template_directory_uri().'/images/why-choose-us.jpg"][/column_content][column_content type="right-column-45"][section-main-title title="World Best Fitness Center You Like It" subtitle="WHY CHOOSE US" color="#000000" align="left"][whychooseus icon="'.get_template_directory_uri().'/images/chooseus-icon-1.png" title="Cardio Exercise" description="Praesent nec metus malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin" link="#"][whychooseus icon="'.get_template_directory_uri().'/images/chooseus-icon-2.png" title="Modren Equipment" description="Praesent nec metus malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin" link="#"][whychooseus icon="'.get_template_directory_uri().'/images/chooseus-icon-3.png" title="Special Support" description="Praesent nec metus malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin" link="#"][/column_content][clear][/row]',
		),
		
		2 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section2',
			'titlecolor'	=> '#282828',
			'bgcolor' 		=> '#191919',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row][column_content type="left-column-30"][custom-video youtubeid="PQN7sXEj3Mk" cover="'.get_template_directory_uri().'/images/video-cover.jpg"][/column_content][column_content type="left-column-85"][section-main-title title="OUR FEATURED CLASSES" subtitle="OUR CLASSES" color="#ffffff" align="left"][our_classes_slider][our_classes image="'.get_template_directory_uri().'/images/our_classes1.jpg" title="Strength Training" description="Posuere tellus imper facilisis. Curabitur faucibusy" readmore="Read More" link="#"][our_classes image="'.get_template_directory_uri().'/images/our_classes2.jpg" title="Boxing For Man" description="Posuere tellus imper facilisis. Curabitur faucibusy" readmore="Read More" link="#"][our_classes image="'.get_template_directory_uri().'/images/our_classes3.jpg" title="Fitness For Man" description="Posuere tellus imper facilisis. Curabitur faucibusy" readmore="Read More" link="#"][our_classes image="'.get_template_directory_uri().'/images/our_classes2.jpg" title="Boxing For Man" description="Posuere tellus imper facilisis. Curabitur faucibusy" readmore="Read More" link="#"][/our_classes_slider][/column_content][clear][/row]',
		),	

		3 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section3',
			'titlecolor'	=> '#000000',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri().'/images/section3.jpg',
			'class'			=> '',
			'content'		=> '[column_content type="left-column-65"][section-main-title title="Our Featured Services" subtitle="WHAT WE DO" color="#292929" align="left"][row][our-sevices icon="'.get_template_directory_uri().'/images/services-icon-1.png" title="Weight Lifting" description="Praesent nec metusm ales, sollicitudin arcuy nec, pharetra felis." link="#"][our-sevices icon="'.get_template_directory_uri().'/images/services-icon-2.png" title="Running" description="Praesent nec metusm ales, sollicitudin arcuy nec, pharetra felis." link="#"][our-sevices icon="'.get_template_directory_uri().'/images/services-icon-3.png" title="Yoga Meditation" description="Praesent nec metusm ales, sollicitudin arcuy nec, pharetra felis." link="#"][our-sevices icon="'.get_template_directory_uri().'/images/services-icon-4.png" title="Body Building" description="Praesent nec metusm ales, sollicitudin arcuy nec, pharetra felis." link="#"][clear][/row][/column_content][clear]'
		),
		
		4 => array(
			'section_title'	=> 'Our Working Process',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section4',
			'titlecolor'	=> '#ffffff',
			'bgcolor' 		=> '#121212',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[working-process number="01" image="'.get_template_directory_uri().'/images/special-service-1.png" title="Connect With Us" description="Praesent nec metusm ales, sollicitudin arcuy" link="#" color="#ffffff"][working-process number="02" image="'.get_template_directory_uri().'/images/special-service-2.png" title="Choose Your Plan" description="Praesent nec metusm ales, sollicitudin arcuy" link="#" color="#ffffff"][working-process number="03" image="'.get_template_directory_uri().'/images/special-service-3.png" title="Schedule Exercise" description="Praesent nec metusm ales, sollicitudin arcuy" link="#" color="#ffffff"][working-process number="04" image="'.get_template_directory_uri().'/images/special-service-4.png" title="Change Your Body" description="Praesent nec metusm ales, sollicitudin arcuy" link="#" color="#ffffff"]',
		),		

		5 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section5',
			'titlecolor'	=> '#282828',
			'bgcolor' 		=> '#f7f7f7',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row][column_content type="left-column-50"][weight-lose-img image="'.get_template_directory_uri().'/images/thumbnail-2.jpg"][/column_content][column_content type="right-column-50"][section-main-title title="Lose your weight in just 2 weeks" subtitle="Have Extra Weight?" color="#282828" align="left"][subtitle color="#494848" size="17px" margin="0 0 50px 0" align="left" description="Praesent nec metus malesuada, sollicitudin arcu nec, pharetr felis. Ut sollicitudin ut lectus feugiat sodales. Aliquam erat volut. Quisque tempus pulvinar nibh, sit amet varius ex fringilla vitae. Sed pharetra diam ut leo efficitur eleifend. Integer ut auctor justo. Praesent inday viverra dui. Aenean aliquet neque"][our-achivement icon="'.get_template_directory_uri().'/images/achivement-1.png" title="Visit Our Gym" link="#"][our-achivement icon="'.get_template_directory_uri().'/images/achivement-2.png" title="Work Out" link="#"][our-achivement icon="'.get_template_directory_uri().'/images/achivement-3.png" title="Get Result" link="#"][/column_content][clear][/row]'
		),
		
		6 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section6',
			'titlecolor'	=> '#ffffff',
			'bgcolor' 		=> '#efbf01',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row][column_content type="left-column-50"][fitness-class-image image="'.get_template_directory_uri().'/images/thumbnail-3.png"][/column_content][column_content type="right-column-50"][section-main-title title="GET 30% DISCOUNT" subtitle="Join Now Fitness Classes" color="#ffffff" align="left"]<div class="highlight-box"><h3>WHEN REGISTERING FOR THE FIRST TIME</h3></div>[subtitle color="#fff" size="17px" margin="0 0 30px 0" align="left" description="Praesent nec metus malesuada, sollicitudin arcu nec, pharetr felis. Ut sollicitudin ut lectus feugiat sodales."][button align="left" name="Register Now" link="#" target="_self"][/column_content][clear][/row]'
		),
				
		7 => array(
			'section_title'	=> 'Choose Your Best Plan',
			'section_sub_title'	=> 'PRICING PLAN',
			'menutitle'		=> 'section7',
			'titlecolor'	=> '#000000',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri().'/images/section7.jpg',
			'class'			=> '',
			'content'		=> '
[pricing_table columns="3"]
[price_column highlight="no" bgcolor="#f6f6f6" image="'.get_template_directory_uri().'/images/plan-image-1.jpg"]	
	[package_price month="Monthly"]$35[/package_price]
	[price_header]Standard[/price_header]
	[price_row]Personal Trainer[/price_row]
	[price_row]Special Meditation[/price_row]
	[price_row]Using all Tools[/price_row]
	[price_row]24 Hour Services[/price_row]
	[price_footer link="#1"]JOIN TODAY[/price_footer]	
[/price_column]
[price_column highlight="yes" bgcolor="#000000" image="'.get_template_directory_uri().'/images/plan-image-2.jpg"]	
	[package_price month="Monthly"]$40[/package_price]
	[price_header]Premium[/price_header]
	[price_row]Personal Trainer[/price_row]
	[price_row]Special Meditation[/price_row]
	[price_row]Using all Tools[/price_row]
	[price_row]24 Hour Services[/price_row]
	[price_footer link="#2"]JOIN TODAY[/price_footer]
[/price_column]
[price_column highlight="no" bgcolor="#f6f6f6" image="'.get_template_directory_uri().'/images/plan-image-3.jpg"]	
	[package_price month="Monthly"]$48[/package_price]
	[price_header]Platinum[/price_header]
	[price_row]Personal Trainer[/price_row]
	[price_row]Special Meditation[/price_row]
	[price_row]Using all Tools[/price_row]
	[price_row]24 Hour Services[/price_row]
	[price_footer link="#3"]JOIN TODAY[/price_footer]
[/price_column]
[/pricing_table]
			'
		),
		
		8 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section8',
			'titlecolor'	=> '#000000',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[fitness_yoga image="'.get_template_directory_uri().'/images/fitness-1.jpg" icon="'.get_template_directory_uri().'/images/fitness-icon-1.png" title="Aerobics" description="Praesent necmetus any malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin." link="#"][fitness_yoga image="'.get_template_directory_uri().'/images/fitness-2.jpg" icon="'.get_template_directory_uri().'/images/fitness-icon-2.png" title="Zumba" description="Praesent necmetus any malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin." link="#"][fitness_yoga image="'.get_template_directory_uri().'/images/fitness-3.jpg" icon="'.get_template_directory_uri().'/images/fitness-icon-3.png" title="Stretching" description="Praesent necmetus any malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin." link="#"][fitness_yoga image="'.get_template_directory_uri().'/images/fitness-4.jpg" icon="'.get_template_directory_uri().'/images/fitness-icon-4.png" title="Kick Boxing" description="Praesent necmetus any malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin." link="#"]'
			),	
		
		9 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section9',
			'titlecolor'	=> '#000000',
			'bgcolor' 		=> '#f6f6f6',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[row][column_content type="left-column-50 our-team-title"][section-main-title title="We have an expert team to train our clients" subtitle="" color="#000000" align="left"][/column_content][column_content type="right-column-50"][subtitle color="#494848" size="17px" margin="0 0 50px 0" align="left" description="Praesent nec metus malesuada, sollicitudin arcu nec, phare tra felis. Ut sollicitudin ut lectus feugiat sodales. Aliquamerat volutpat. Quisque tempus pulvinar nibh sit amet varius exfrin gilla vitae. Sed pharetra diam ut leo efficitur eleifend."][/column_content][clear][/row][clear][our-team show="4"]'
		),
		
		
		10 => array(
			'section_title'	=> '',
			'section_sub_title'	=> '',
			'menutitle'		=> 'section10',
			'titlecolor'	=> '#000000',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[contactinfo icon="'.get_template_directory_uri().'/images/contact-icon-1.png" title="Membership Cards" info="Discount for all members" bgcolor="#efbf01" color="#ffffff"][contactinfo icon="'.get_template_directory_uri().'/images/contact-icon-2.png" title="Rackets Sports" info="Over 40 fitness classes" bgcolor="#efa901" color="#ffffff"][contactinfo icon="'.get_template_directory_uri().'/images/contact-icon-3.png" title="Find a Club" info="At your preferred location" bgcolor="#ef9301" color="#ffffff"]'
		),
				
	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'crossfit-gym-pro'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'crossfit-gym-pro'),
		'desc' => __('Upload your main logo here', 'crossfit-gym-pro'),
		'id' => 'logo',
		'class' => '',
		'std'	=> get_template_directory_uri().'/images/logo.png',
		//'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('Change your custom logo height', 'crossfit-gym-pro'),
		'id' => 'logoheight',
		'std' => '68',
		'type' => 'text');
		
	$options[] = array(	
		'name' => __('Site title & Description', 'crossfit-gym-pro'),		
		'desc'	=> __('Check to show site title and description', 'crossfit-gym-pro'),
		'id'	=> 'hide_titledesc',
		'type'	=> 'checkbox',
		'std'	=> '');		
		
	$options[] = array(	
		'name' => __('Layout Option', 'crossfit-gym-pro'),		
		'desc'	=> __('Check To View Box Layout ', 'crossfit-gym-pro'),
		'id'	=> 'boxlayout',
		'type'	=> 'checkbox',
		'std'	=> '');
			
	$options[] = array(
		'name' => __('Sticky Header', 'crossfit-gym-pro'),
		'desc' => __('Check this to show sticky header on scroll', 'crossfit-gym-pro'),
		'id' => 'headstick',
		'std' => '',
		'type' => 'checkbox');		
			
	$options[] = array(
		'name' => __('Hide Animation', 'crossfit-gym-pro'),
		'desc' => __('Check this to hide animation on scroll', 'crossfit-gym-pro'),
		'id' => 'scrollanimation',
		'std' => '',
		'type' => 'checkbox');		

	$options[] = array(
		'name' => __('Custom CSS', 'crossfit-gym-pro'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'crossfit-gym-pro'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');				
				
	$options[] = array(
		'name' => __('Header Contact Info', 'crossfit-gym-pro'),
		'desc' => __('Add Phone Number', 'crossfit-gym-pro'),
		'id' => 'headerphone',
		'std' => 'Call Us:  202-555-0115',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Add Email Address', 'crossfit-gym-pro'),
		'id' => 'headeremail',
		'std' => 'Email:  contact@sitename.com',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Check to hide header contact info strip', 'crossfit-gym-pro'),
		'id' => 'headinfodata',
		'std' => '',
		'type' => 'checkbox');	
 
	// font family start 		
	$options[] = array(
		'name' => __('Font Faces', 'crossfit-gym-pro'),
		'desc' => __('Select font for the body text', 'crossfit-gym-pro'),
		'id' => 'bodyfontface',
		'type' => 'select',
		'std' => 'Poppins',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the textual logo', 'crossfit-gym-pro'),
		'id' => 'logofontface',
		'type' => 'select',
		'std' => 'Teko',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the navigation text', 'crossfit-gym-pro'),
		'id' => 'navfontface',
		'type' => 'select',
		'std' => 'Poppins',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font family for all heading tag.', 'crossfit-gym-pro'),
		'id' => 'headfontface',
		'type' => 'select',
		'std' => 'Teko',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for Section title', 'crossfit-gym-pro'),
		'id' => 'sectiontitlefontface',
		'type' => 'select',
		'std' => 'Teko',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for Section subtitle', 'crossfit-gym-pro'),
		'id' => 'sectionsubtitlefontface',
		'type' => 'select',
		'std' => 'Teko',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for footer title', 'crossfit-gym-pro'),
		'id' => 'footertitlefontface',
		'type' => 'select',
		'std' => 'Poppins',
		'options' => $font_types );	
	
	$options[] = array(
		'desc' => __('Select font for Slide title', 'crossfit-gym-pro'),
		'id' => 'slidetitlefontface',
		'type' => 'select',
		'std' => 'Teko',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for Slide Description', 'crossfit-gym-pro'),
		'id' => 'slidedesfontface',
		'type' => 'select',
		'std' => 'Poppins',
		'options' => $font_types );	

		
	// font sizes start	
	$options[] = array(
		'name' => __('Font Sizes', 'crossfit-gym-pro'),
		'desc' => __('Select font size for body text', 'crossfit-gym-pro'),
		'id' => 'bodyfontsize',
		'type' => 'select',
		'std' => '17px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo', 'crossfit-gym-pro'),
		'id' => 'logofontsize',
		'type' => 'select',
		'std' => '40px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for navigation', 'crossfit-gym-pro'),
		'id' => 'navfontsize',
		'type' => 'select',
		'std' => '17px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section sub title', 'crossfit-gym-pro'),
		'id' => 'secsubtitlesize',
		'type' => 'select',
		'std' => '24px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section title', 'crossfit-gym-pro'),
		'id' => 'sectitlesize',
		'type' => 'select',
		'std' => '58px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for footer title', 'crossfit-gym-pro'),
		'id' => 'ftfontsize',
		'type' => 'select',
		'std' => '24px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for sidebar widgets title', 'crossfit-gym-pro'),
		'id' => 'sidebarfontsize',
		'type' => 'select',
		'std' => '24px',
		'options' => $font_sizes );	

	$options[] = array(
		'desc' => __('Select h1 font size', 'crossfit-gym-pro'),
		'id' => 'h1fontsize',
		'std' => '30px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h2 font size', 'crossfit-gym-pro'),
		'id' => 'h2fontsize',
		'std' => '30px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h3 font size', 'crossfit-gym-pro'),
		'id' => 'h3fontsize',
		'std' => '28px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h4 font size', 'crossfit-gym-pro'),
		'id' => 'h4fontsize',
		'std' => '24px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h5 font size', 'crossfit-gym-pro'),
		'id' => 'h5fontsize',
		'std' => '20px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h6 font size', 'crossfit-gym-pro'),
		'id' => 'h6fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);


	// font colors start

	$options[] = array(
		'name' => __('Site Colors Scheme', 'crossfit-gym-pro'),
		'desc' => __('Change the color scheme of hole site', 'crossfit-gym-pro'),
		'id' => 'colorscheme',
		'std' => '#f5c404',
		'type' => 'color');

	$options[] = array(
		'desc' => __('change hove/active color scheme for hole site', 'crossfit-gym-pro'),
		'id' => 'allsitehovercolor',
		'std' => '#ef9301',
		'type' => 'color');		
/*		
	$options[] = array(		
		'desc' => __('Select background color opacity for special services', 'wedshot-pro'),
		'id' => 'servicesbgpacity',
		'std' => '0.8',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));	
		*/
	$options[] = array(	
		'name' => __('Font Colors', 'crossfit-gym-pro'),	
		'desc' => __('Select font color for the body text', 'crossfit-gym-pro'),
		'id' => 'bodyfontcolor',
		'std' => '#595959',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for textual logo', 'crossfit-gym-pro'),
		'id' => 'logofontcolor',
		'std' => '#282828',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for logo tagline', 'crossfit-gym-pro'),
		'id' => 'logotaglinecolor',
		'std' => '#282828',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for header top phone and email', 'crossfit-gym-pro'),
		'id' => 'headertopfontcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for section title', 'crossfit-gym-pro'),
		'id' => 'sectitlecolor',
		'std' => '#282828',
		'type' => 'color');	
	
	$options[] = array(
		'desc' => __('Select font color for navigation', 'crossfit-gym-pro'),
		'id' => 'navfontcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover submenu color for navigation', 'crossfit-gym-pro'),
		'id' => 'navactivefontcolor',
		'std' => '#000000',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for widget title', 'crossfit-gym-pro'),
		'id' => 'wdgttitleccolor',
		'std' => '#282828',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for footer title', 'crossfit-gym-pro'),
		'id' => 'foottitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
				
	$options[] = array(
		'desc' => __('Select font color for footer', 'crossfit-gym-pro'),
		'id' => 'footdesccolor',
		'std' => '#d9d9d9',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer left text (copyright)', 'crossfit-gym-pro'),
		'id' => 'copycolor',
		'std' => '#cecece',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer right text (design by)', 'crossfit-gym-pro'),
		'id' => 'designcolor',
		'std' => '#cecece',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover color for links / anchor tags', 'crossfit-gym-pro'),
		'id' => 'linkhovercolor',
		'std' => '#272727',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for sidebar li a', 'crossfit-gym-pro'),
		'id' => 'sidebarfontcolor',
		'std' => '#78797c',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer copyright links', 'crossfit-gym-pro'),
		'id' => 'copylinkshover',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h1 font color', 'crossfit-gym-pro'),
		'id' => 'h1fontcolor',
		'std' => '#282828',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select h2 font color', 'crossfit-gym-pro'),
		'id' => 'h2fontcolor',
		'std' => '#282828',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h3 font color', 'crossfit-gym-pro'),
		'id' => 'h3fontcolor',
		'std' => '#282828',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h4 font color', 'crossfit-gym-pro'),
		'id' => 'h4fontcolor',
		'std' => '#282828',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h5 font color', 'crossfit-gym-pro'),
		'id' => 'h5fontcolor',
		'std' => '#282828',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h6 font color', 'crossfit-gym-pro'),
		'id' => 'h6fontcolor',
		'std' => '#282828',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for social icons color', 'crossfit-gym-pro'),
		'id' => 'socialcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for social icons hover color', 'crossfit-gym-pro'),
		'id' => 'socialcolorhover',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for sidebar widget box', 'crossfit-gym-pro'),
		'id' => 'widgetboxfontcolor',
		'std' => '#6e6d6d',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer recent posts', 'crossfit-gym-pro'),
		'id' => 'footerpoststitlecolor',
		'std' => '#d9d9d9',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for toggle menu on responsive', 'crossfit-gym-pro'),
		'id' => 'togglemenucolor',
		'std' => '#ffffff',
		'type' => 'color');					
		
	// Background start	
	$options[] = array(
		'name' => __('Background Colors', 'crossfit-gym-pro'),	
		'desc' => __('Select background color for header', 'crossfit-gym-pro'),
		'id' => 'headerbgcolor',
		'std' => '#060606',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select background opacity color for header', 'crossfit-gym-pro'),
		'id' => 'headerbgpacity',
		'std' => '1',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));			

	$options[] = array(		
		'desc' => __('Select background color for header top strip', 'crossfit-gym-pro'),
		'id' => 'headertopbgcolor',
		'std' => '#060606',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select background color for header logo', 'crossfit-gym-pro'),
		'id' => 'logobgcolor',
		'std' => '#ffffff',
		'type' => 'color');		
			
	$options[] = array(		
		'desc' => __('Select background color for footer', 'crossfit-gym-pro'),
		'id' => 'footerbgcolor',
		'std' => '#0b0b0b',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for Footer Copyright', 'crossfit-gym-pro'),
		'id' => 'copybgcolor',
		'std' => '#0b0b0b',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select background color for client testimonials pager dots', 'crossfit-gym-pro'),
		'id' => 'testidotsbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
	
	$options[] = array(
		'desc' => __('Select background color for sidebar widget search box', 'crossfit-gym-pro'),
		'id' => 'widgetboxbgcolor',
		'std' => '#F0EFEF',
		'type' => 'color');	
		
 	$options[] = array(
		'desc' => __('Select background color for Social Icons', 'crossfit-gym-pro'),
		'id' => 'socialcolorbg',
		'std' => '#242424',
		'type' => 'color');			
 	
	// Border colors			
	$options[] = array(	
		'name' => __('Border Colors', 'crossfit-gym-pro'),		
		'desc' => __('Select border color for sidebar li a', 'crossfit-gym-pro'),
		'id' => 'sidebarliaborder',
		'std' => '#eeeeee',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for gallery filter', 'crossfit-gym-pro'),
		'id' => 'galleryfilterbdr',
		'std' => '#494949',
		'type' => 'color');	

	// Default Buttons		
	$options[] = array(
		'name' => __('Button Colors', 'crossfit-gym-pro'),
		'desc' => __('Select background hover color for default button', 'crossfit-gym-pro'),
		'id' => 'btnbghvcolor',
		'std' => '#202020',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color default button', 'crossfit-gym-pro'),
		'id' => 'btntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font hover color for default button', 'crossfit-gym-pro'),
		'id' => 'btntxthvcolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for shop now button on slider', 'crossfit-gym-pro'),
		'id' => 'shopbtnbgcolor',
		'std' => '#202020',
		'type' => 'color');	
													

	// Slider Caption colors
	$options[] = array(	
		'name' => __('Slider Caption Colors', 'crossfit-gym-pro'),				
		'desc' => __('Select font color for slider title', 'crossfit-gym-pro'),
		'id' => 'slidetitlecolor',
		'std' => '#ffffff',
		'type' => 'color');			
		
	$options[] = array(		
		'desc' => __('Select font color for slider description', 'crossfit-gym-pro'),
		'id' => 'slidedesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font size for slider title', 'crossfit-gym-pro'),
		'id' => 'slidetitlefontsize',
		'type' => 'select',
		'std' => '67px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for slider description', 'crossfit-gym-pro'),
		'id' => 'slidedescfontsize',
		'type' => 'select',
		'std' => '17px',
		'options' => $font_sizes );
		
	// Slider controls colors		
	/*$options[] = array(
		'name' => __('Slider Colors Options', 'crossfit-gym-pro'),
		'desc' => __('Select background color for slider caption', 'crossfit-gym-pro'),
		'id' => 'sldcaptionbg',
		'std' => '#2d2927',
		'type' => 'color');
		
 	$options[] = array(		
		'desc' => __('Select background color opacity for slider caption', 'crossfit-gym-pro'),
		'id' => 'sldcaptionbgpacity',
		'std' => '0.5',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));	*/
		
	$options[] = array(
		'name' => __('Slider controls Colors', 'crossfit-gym-pro'),
		'desc' => __('Select background color for slider pager', 'crossfit-gym-pro'),
		'id' => 'sldpagebg',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for slider navigation arrows', 'crossfit-gym-pro'),
		'id' => 'sldarrowbg',
		'std' => '#f5c404',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select background opacity color for header slider navigation arrows', 'crossfit-gym-pro'),
		'id' => 'sldarrowopacity',
		'std' => '1',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));			

	$options[] = array(	
		'name' => __('Excerpt Lenth', 'crossfit-gym-pro'),		
		'desc' => __('Select excerpt length for latest news boxes section', 'crossfit-gym-pro'),
		'id' => 'latestnewslength',
		'std' => '15',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Select excerpt length for testimonials section', 'crossfit-gym-pro'),
		'id' => 'testimonialsexcerptlength',
		'std' => '25',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Select excerpt length for blog post', 'crossfit-gym-pro'),
		'id' => 'blogpostexcerptlength',
		'std' => '45',
		'type' => 'text');
		
	$options[] = array(	
		'name' => __('Read More Custom Text', 'crossfit-gym-pro'),		
		'desc' => __('Change read more button text for blog posts section ', 'crossfit-gym-pro'),
		'id' => 'blogpostreadmoretext',
		'std' => 'Read More &rarr;',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change read more button text for latest blog post template', 'crossfit-gym-pro'),
		'id' => 'readmoretext_blogtemplates',
		'std' => 'Read more &rarr;',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change Show All Button text for photo gallery section', 'crossfit-gym-pro'),
		'id' => 'galleryshowallbtn',
		'std' => 'Show All',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Change menu word on responsive view', 'crossfit-gym-pro'),
		'id' => 'menuwordchange',
		'std' => 'Menu',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Blog Single Layout', 'crossfit-gym-pro'),
		'desc' => __('Select layout. eg:Boxed, Wide', 'crossfit-gym-pro'),
		'id' => 'singlelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Blog Single Right Sidebar', 'singleleft'=>'Blog Single Left Sidebar', 'sitefull'=>'Blog Single Full Width', 'nosidebar'=>'Blog Single No Sidebar') );	
		
	$options[] = array(
		'name' => __('Team Single Layout', 'crossfit-gym-pro'),
		'desc' => __('Select layout. eg:left,right,full', 'crossfit-gym-pro'),
		'id' => 'teamsinglelayout',
		'type' => 'select',
		'std' => 'sitefull',
		'options' => array('singleright'=>'Team Single Right Sidebar', 'singleleft'=>'Team Single Left Sidebar', 'sitefull'=>'Team Single Full Width', 'nosidebar'=>'Team Single No Sidebar') );	
		
		
	$options[] = array(
		'name' => __('Woocommerce Page Layout', 'crossfit-gym-pro'),
		'desc' => __('Select layout. eg:right-sidebar, left-sidebar, full-width', 'crossfit-gym-pro'),
		'id' => 'woocommercelayout',
		'type' => 'select',
		'std' => 'woocommercesitefull',
		'options' => array('woocommerceright'=>'Woocommerce Right Sidebar', 'woocommerceleft'=>'Woocommerce Left Sidebar', 'woocommercesitefull'=>'Woocommerce Full Width') );	
		
	$options[] = array(
		'name' => __('Testimonials Single Layout', 'crossfit-gym-pro'),
		'desc' => __('Select layout. eg:left,right,full', 'crossfit-gym-pro'),
		'id' => 'testimonialsinglelayout',
		'type' => 'select',
		'std' => 'sitefull',
		'options' => array('singleright'=>'Testimonials Single Right Sidebar', 'singleleft'=>'Testimonials Single Left Sidebar', 'sitefull'=>'Testimonials Single Full Width', 'nosidebar'=>'Testimonials Single No Sidebar') );	
	
	
	$options[] = array(	
		'name' => __('Testimonials Rotating Speed', 'crossfit-gym-pro'),	
		'desc' => __('manage testimonials rotating speed.', 'crossfit-gym-pro'),
		'id' => 'testimonialsrotatingspeed',
		'std' => '8000',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('True/False Auto play Testimonials.','crossfit-gym-pro'),
		'id' => 'testimonialsautoplay',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'True', 'false'=>'False'));			
		
	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'crossfit-gym-pro'),
		'type' => 'heading');

// About Us Section
 	$options[] = array(	
		'name' => __('About Us Section', 'crossfit-gym-pro'),
		'desc'	=> __('Select page for About Us section','crossfit-gym-pro'),
		'id' 	=> 'welcomebox',
		'type'	=> 'select',
		'options' => $options_pages,
	);

	$options[] = array(		
		'desc' => __('Upload image for About Us page', 'crossfit-gym-pro'),
		'id' => 'welcomeimg',
 		'std'	=> '',
		'type' => 'upload');
				
	$options[] = array(		
		'desc' => __('Select excerpt length for About Us section', 'crossfit-gym-pro'),
		'id' => 'welcomelength',
		'std' => '30',
		'type' => 'text');
	
 	$options[] = array(	
		'desc' => __('Section About Us subtitle', 'crossfit-gym-pro'),
		'id' => 'welcomesubtitle',
		'std' => 'ABOUT US',
		'type' => 'text'); 
		
 	$options[] = array(	
		'desc' => __('Section About Us quotes', 'crossfit-gym-pro'),
		'id' => 'welcomequotes',
		'std' => 'Push harder than yesterday if you want on the different tomorrow.',
		'type' => 'textarea'); 

	$options[] = array(		
		'desc' => __('Select add about section about info', 'crossfit-gym-pro'),
		'id' => 'aboutmeinfo',
		'std' => '[aboutmeinfo icon="'.get_template_directory_uri().'/images/aboutmeinfo.png" title="Mark Hander" description="CEO - Fitness Club" button="WHAT WE DO" link="#"]',
		'type' => 'textarea');		

/* 	$options[] = array(		
		'desc' => __('Add button text for welcome page', 'crossfit-gym-pro'),
		'id' => 'welcomebutton',
 		'std'	=> 'Read More',
		'type' => 'text'); */

	$options[] = array(
		'desc' => __('Select background color for about section', 'crossfit-gym-pro'),
		'id' => 'welcomessection',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(			
		'desc'	=> __('Check to hide this section', 'crossfit-gym-pro'),
		'id'	=> 'hidewelcomesection',
		'type'	=> 'checkbox',
		'std'	=> '');	//welcome sectiom end
		
		
// Welcome Section
 	$options[] = array(	
		'name' => __('Welcome Section', 'crossfit-gym-pro'),
		'desc'	=> __('Select page for Welcome Section','crossfit-gym-pro'),
		'id' 	=> 'pagesectionpage',
		'type'	=> 'select',
		'options' => $options_pages,
	);
				
	$options[] = array(		
		'desc' => __('Select excerpt length', 'crossfit-gym-pro'),
		'id' => 'pagesectionpagelength',
		'std' => '30',
		'type' => 'text');

	$options[] = array(		
		'desc' => __('Add video for Welcome section', 'crossfit-gym-pro'),
		'id' => 'videosection',
		'std' => '[custom-video youtubeid="g_bMfP6_TOw" cover="'.get_template_directory_uri().'/images/myvideocover.jpg"]',
		'type' => 'textarea');	
				
	$options[] = array(
		'desc' => __('Select background color for Welcome section', 'crossfit-gym-pro'),
		'id' => 'pagesectiontwo',
		'std' => '#f6f6f6',
		'type' => 'color');		
		
	$options[] = array(			
		'desc'	=> __('Check to hide this page section', 'crossfit-gym-pro'),
		'id'	=> 'hidesection2',
		'type'	=> 'checkbox',
		'std'	=> '');	//page sectiom end
		
	$options[] = array(	
		'name' => __('Services Section', 'crossfit-gym-pro'),
		'desc'	=> __('Services section title','crossfit-gym-pro'),
		'id' => 'topboxtitle',
		'std' => 'We are #1 CrossFit Gym',
		'type' => 'text');
		
	$options[] = array(	
		'desc' => __('Services section sub title', 'crossfit-gym-pro'),
		'id' => 'topboxsubtitle',
		'std' => 'Be part of our premier CrossFit community',
		'type' => 'text');		
		
	$options[] = array(	
		'name' => __('Services Section Five Column', 'crossfit-gym-pro'),
		'desc'	=> __('First box for services section','crossfit-gym-pro'),
		'id' 	=> 'box1',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('Upload image for first box.', 'crossfit-gym-pro'),
		'id' => 'boximg1',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Second box for services section','crossfit-gym-pro'),
		'id' 	=> 'box2',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('Upload image for second box.', 'crossfit-gym-pro'),
		'id' => 'boximg2',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Third box for services section','crossfit-gym-pro'),
		'id' 	=> 'box3',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('Upload image for third box.', 'crossfit-gym-pro'),
		'id' => 'boximg3',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Fourth box for services section','crossfit-gym-pro'),
		'id' 	=> 'box4',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('Upload image for fourth box.', 'crossfit-gym-pro'),
		'id' => 'boximg4',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Fifth box for services section','crossfit-gym-pro'),
		'id' 	=> 'box5',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('Upload image for fifth box.', 'crossfit-gym-pro'),
		'id' => 'boximg5',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Six box for services section','crossfit-gym-pro'),
		'id' 	=> 'box6',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('Upload image for six box.', 'crossfit-gym-pro'),
		'id' => 'boximg6',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');	
/*
	$options[] = array(	
		'desc' => __('Change read more button text for  top mission four boxes ', 'crossfit-gym-pro'),
		'id' => 'readmorebutton',
		'std' => 'Read More',
		'type' => 'text');
*/ 
	$options[] = array(		
		'desc' => __('Select excerpt length for services section', 'crossfit-gym-pro'),
		'id' => 'pageboxlength',
		'std' => '',
		'type' => 'text');			

	$options[] = array(
		'desc' => __('Select background color for services section', 'crossfit-gym-pro'),
		'id' => 'servicessection',
		'std' => '#fefefe',
		'type' => 'color');		

	$options[] = array(			
		'desc'	=> __('Check to hide Services section', 'crossfit-gym-pro'),
		'id'	=> 'hidefourbxsec',
		'type'	=> 'checkbox',
		'std'	=> '');
			
	//Section tab
	$options[] = array(
		'name' => __('Number of Sections', 'crossfit-gym-pro'),
		'desc' => __('Select number of sections', 'crossfit-gym-pro'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '10',
		'options' => array_combine(range(1,30), range(1,30)) );

	$numsecs = of_get_option( 'numsection', 10 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section ".$n."</h3>", 'crossfit-gym-pro'),
			'class' => 'toggle_title',
			'type' => 'info');
	
		$options[] = array(
			'name' => __('Section Main Title', 'crossfit-gym-pro'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');
		
		$options[] = array(
			'name' => __('Section Sub Title', 'crossfit-gym-pro'),
			'id' => 'sectionsubtitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_sub_title']) ) ? $section_text[$n]['section_sub_title'] : '' ),
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('Section ID', 'crossfit-gym-pro'),
			'desc'	=> __('Enter your section ID here. SECTION ID MUST BE IN SMALL LETTERS ONLY AND DO NOT ADD SPACE OR SYMBOL.', 'crossfit-gym-pro'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');
	$options[] = array(
			'name' => __('Section Title Color', 'crossfit-gym-pro'),
			'desc' => __('Select title color for section', 'crossfit-gym-pro'),
			'id' => 'titlecolor'.$n,
			'std' => ( ( isset($section_text[$n]['titlecolor']) ) ? $section_text[$n]['titlecolor'] : '' ),
			'type' => 'color');
		$options[] = array(
			'name' => __('Section Background Color', 'crossfit-gym-pro'),
			'desc' => __('Select background color for section', 'crossfit-gym-pro'),
			'id' => 'sectionbgcolor'.$n,
			'std' => ( ( isset($section_text[$n]['bgcolor']) ) ? $section_text[$n]['bgcolor'] : '' ),
			'type' => 'color');
			
		$options[] = array(
			'name' => __('Background Image', 'crossfit-gym-pro'),
			'id' => 'sectionbgimage'.$n,
			'class' => '',
			'std' => ( ( isset($section_text[$n]['bgimage']) ) ? $section_text[$n]['bgimage'] : '' ),
			'type' => 'upload');

		$options[] = array(
			'name' => __('Section CSS Class', 'crossfit-gym-pro'),
			'desc' => __('Set class for this section.', 'crossfit-gym-pro'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name'	=> __('Hide Section', 'crossfit-gym-pro'),
			'desc'	=> __('Check to hide this section', 'crossfit-gym-pro'),
			'id'	=> 'hidesec'.$n,
			'type'	=> 'checkbox',
			'std'	=> '');

		$options[] = array(
			'name' => __('Section Content', 'crossfit-gym-pro'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}


	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'crossfit-gym-pro'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Inner Page Banner', 'crossfit-gym-pro'),
		'desc' => __('Upload inner page banner for site', 'crossfit-gym-pro'),
		'id' => 'innerpagebanner',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/inner-banner.jpg",
		'type' => 'upload');
		
		
	$options[] = array(
		'name' => __('Custom Slider Shortcode Area For Home Page', 'crossfit-gym-pro'),
		'desc' => __('Enter here your slider shortcode without php tag', 'crossfit-gym-pro'),
		'id' => 'customslider',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'name' => __('Slider Effects and Timing', 'crossfit-gym-pro'),
		'desc' => __('Select slider effect.','crossfit-gym-pro'),
		'id' => 'slideefect',
		'std' => 'random',
		'type' => 'select',
		'options' => array('random'=>'Random', 'fade'=>'Fade', 'fold'=>'Fold', 'sliceDown'=>'Slide Down', 'sliceDownLeft'=>'Slide Down Left', 'sliceUp'=>'Slice Up', 'sliceUpLeft'=>'Slice Up Left', 'sliceUpDown'=>'Slice Up Down', 'sliceUpDownLeft'=>'Slice Up Down Left', 'slideInRight'=>'SlideIn Right', 'slideInLeft'=>'SlideIn Left', 'boxRandom'=>'Box Random', 'boxRain'=>'Box Rain', 'boxRainReverse'=>'Box Rain Reverse', 'boxRainGrow'=>'Box Rain Grow', 'boxRainGrowReverse'=>'Box Rain Grow Reverse' ));
		
	$options[] = array(
		'desc' => __('Animation speed should be multiple of 100.', 'crossfit-gym-pro'),
		'id' => 'slideanim',
		'std' => 500,
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add slide pause time.', 'crossfit-gym-pro'),
		'id' => 'slidepause',
		'std' => 4000,
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide Controllers', 'crossfit-gym-pro'),
		'desc' => __('Hide/Show Direction Naviagtion of slider.','crossfit-gym-pro'),
		'id' => 'slidenav',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Hide/Show pager of slider.','crossfit-gym-pro'),
		'id' => 'slidepage',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Pause Slide on Hover.','crossfit-gym-pro'),
		'id' => 'slidepausehover',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Yes', 'false'=>'No'));	
		
	$options[] = array(
		'name' => __('Slider Image 1', 'crossfit-gym-pro'),
		'desc' => __('First Slide', 'crossfit-gym-pro'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 1', 'crossfit-gym-pro'),
		'id' => 'slidetitle1',
		'std' => ' <span>Inspiring you to live a  healthier lifestyle </span>We are Certified Personal Trainer’s',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc1',
		'std' => 'Praesent nec metus malesuada, sollicitudin arcu nec, pharetra felis. Ut sollicitudin ut lectus.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton1',
		'std' => 'Contact Us',
		'type' => 'text');	

	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl1',
		'std' => '#',
		'type' => 'text');		
		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'crossfit-gym-pro'),
		'desc' => __('Second Slide', 'crossfit-gym-pro'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 2', 'crossfit-gym-pro'),
		'id' => 'slidetitle2',
		'std' => '<span>Build Your Body Strong </span>Ready To Change Your Physique',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc2',
		'std' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
		'type' => 'textarea');	
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton2',
		'std' => 'Read More',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl2',
		'std' => '#',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 3', 'crossfit-gym-pro'),
		'desc' => __('Third Slide', 'crossfit-gym-pro'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 3', 'crossfit-gym-pro'),
		'id' => 'slidetitle3',
		'std' => '<span>Welcome To CrossFit Gym </span>The Best Fitness Studio In Town',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc3',
		'std' => 'Contrary to popular belief, Lorem Ipsum is not simply random text',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton3',
		'std' => 'Contact Us',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl3',
		'std' => '#',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 4', 'crossfit-gym-pro'),
		'desc' => __('Third Slide', 'crossfit-gym-pro'),
		'id' => 'slide4',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 4', 'crossfit-gym-pro'),
		'id' => 'slidetitle4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton4',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl4',
		'std' => '',
		'type' => 'text');				
	
	$options[] = array(
		'name' => __('Slider Image 5', 'crossfit-gym-pro'),
		'desc' => __('Fifth Slide', 'crossfit-gym-pro'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 5', 'crossfit-gym-pro'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton5',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 6', 'crossfit-gym-pro'),
		'desc' => __('Sixth Slide', 'crossfit-gym-pro'),
		'id' => 'slide6',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 6', 'crossfit-gym-pro'),
		'id' => 'slidetitle6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton6',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl6',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 7', 'crossfit-gym-pro'),
		'desc' => __('Seventh Slide', 'crossfit-gym-pro'),
		'id' => 'slide7',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 7', 'crossfit-gym-pro'),
		'id' => 'slidetitle7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton7',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl7',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 8', 'crossfit-gym-pro'),
		'desc' => __('Eighth Slide', 'crossfit-gym-pro'),
		'id' => 'slide8',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 8', 'crossfit-gym-pro'),
		'id' => 'slidetitle8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton8',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl8',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 9', 'crossfit-gym-pro'),
		'desc' => __('Ninth Slide', 'crossfit-gym-pro'),
		'id' => 'slide9',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 9', 'crossfit-gym-pro'),
		'id' => 'slidetitle9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton9',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl9',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 10', 'crossfit-gym-pro'),
		'desc' => __('Tenth Slide', 'crossfit-gym-pro'),
		'id' => 'slide10',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 10', 'crossfit-gym-pro'),
		'id' => 'slidetitle10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'crossfit-gym-pro'),
		'id' => 'slidedesc10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'crossfit-gym-pro'),
		'id' => 'slidebutton10',
		'std' => '',
		'type' => 'text');			
	
	$options[] = array(
		'desc' => __('Slide Url for Read More Button', 'crossfit-gym-pro'),
		'id' => 'slideurl10',
		'std' => '',
		'type' => 'text');
	

	//Footer SETTINGS
	$options[] = array(
		'name' => __('Footer', 'crossfit-gym-pro'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Footer Layout', 'crossfit-gym-pro'),
		'desc' => __('footer Select layout. eg:Column, 1, 2, 3 and 4', 'crossfit-gym-pro'),
		'id' => 'footerlayout',
		'type' => 'select',
		'std' => 'fourcolumn',
		'options' => array('onecolumnnone'=>'Footer Hide', 'onecolumn'=>'Footer 1 column', 'twocolumn'=>'Footer 2 column', 'threecolumn'=>'Footer 3 column', 'fourcolumn'=>'Footer 4 column', ) );			

/*	$options[] = array(
		'name' => __('Footer About Logo', 'crossfit-gym-pro'),
		'desc' => __('About Logo for footer', 'crossfit-gym-pro'),
		'id' => 'abouttitlelogo',
		'std' => get_template_directory_uri().'/images/footer-logo.png',
		'type' => 'upload');*/


    $options[] = array(
        'name' => __('Contact Details', 'crossfit-gym-pro'),
        'desc' => __('Add Contact Details title here', 'crossfit-gym-pro'),
        'id' => 'contacttitle',
        'std' => 'Contact Info',
        'type' => 'text');  
        
    $options[] = array( 
        'desc' => __('Add company short description here.', 'greenest-pro'),
        'id' => 'address',
        'std' => 'Suspendisse interdum, nisi nec effiitur auctor, odio lcongue ligula.',
        'type' => 'textarea');
        
    $options[] = array(     
        'desc' => __('Add phone number here.', 'greenest-pro'),
        'id' => 'phone',
        'std' => ' <span>Phone:</span> +1 123 456 7890',
        'type' => 'textarea');

    $options[] = array(
        'desc' => __('Add email address here.', 'greenest-pro'),
        'id' => 'email',
        'std' => '<span>E-mail:</span> info@sitename.com',
        'type' => 'textarea');

    $options[] = array(     
        'desc' => __('Add website here.', 'crossfit-gym-pro'),
        'id' => 'website',
        'std' => '<span>Website: </span> http://sitename.com',
        'type' => 'textarea');  
        

    $options[] = array(
        'name' => __('Footer Services Title', 'crossfit-gym-pro'),
        'desc' => __('footer Services title.', 'crossfit-gym-pro'),
        'id' => 'footermenutitle',
        'std' => 'Services',
        'type' => 'text');
        
    $options[] = array(
        'name' => __('Footer Latest posts Title', 'crossfit-gym-pro'),
        'desc' => __('footer latest posts title.', 'crossfit-gym-pro'),
        'id' => 'latestpostttl',
        'std' => 'Latest Posts',
        'type' => 'text');      

	$options[] = array(
		'name' => __('Footer Opening Hours Title', 'crossfit-gym-pro'),
		'desc' => __('Opening Hours title for footer', 'crossfit-gym-pro'),
		'id' => 'abouttitle',
		'std' => 'Opening Hours',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Opening Hours', 'crossfit-gym-pro'),
		'desc' => __('Opening Hours for footer', 'crossfit-gym-pro'),
		'id' => 'aboutusdescription',
		'std' => '
			[opening-hours day="Monday" time="09:00 am - 10:00 pm"]
			[opening-hours day="Tuesday" time="08:00 am - 10:00 pm"]
			[opening-hours day="Wednesday" time="09:00 am - 10:00 pm"]
			[opening-hours day="Thursday" time="09:00 am - 10:00 pm"]
			[opening-hours day="Friday" time="08:00 am - 12:00 pm"]
		',
		'type' => 'textarea');
	

	$options[] = array(
		'name' => __('Footer Social Icons', 'crossfit-gym-pro'),
		'desc' => __('social icons for footer', 'crossfit-gym-pro'),
		'id' => 'footersocialicon',
		'std' => '[social_area]
[social icon="fab fa-facebook-f" link="#"]
[social icon="fab fa-instagram" link="#"]
[social icon="fab fa-twitter" link="#"]
[social icon="fab fa-linkedin-in" link="#"]
[/social_area]',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Footer Copyright', 'crossfit-gym-pro'),
		'desc' => __('Copyright Text for your site.', 'crossfit-gym-pro'),
		'id' => 'copytext',
		'std' => '&copy; Copyright 2023 CrossFit Gym. All Rights Reserved - ',
		'type' => 'textarea');
		 
	$options[] = array(
		'desc' => __('Footer Text Link', 'crossfit-gym-pro'),
		'id' => 'ftlink',
		'std' => 'Design by <a href="'.esc_url('https://gracethemes.com').'" target="_blank">Grace Themes</a>',
		'type' => 'textarea',);  
		
	$options[] = array(
		'desc' => __('Footer Back to Top Button', 'crossfit-gym-pro'),
		'id' => 'backtotop',
		'std' => '[back-to-top]',
		'type' => 'textarea',);

	//Short codes
	$options[] = array(
		'name' => __('Short Codes', 'crossfit-gym-pro'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Section Main Title', 'crossfit-gym-pro'),
		'desc' => __('[section-main-title title="TITLE HERE" subtitle="SUBTITLE HERE" color="#ffffff" align="center"]', 'crossfit-gym-pro'),
		'type' => 'info');			
		
	$options[] = array(
		'name' => __('Why Choose Image', 'crossfit-gym-pro'),
		'desc' => __('[why-choose-image image="ADD IMAGE HERE"]', 'crossfit-gym-pro'),
		'type' => 'info');
                
    $options[] = array(
        'name' => __('Why Chooseus', 'crossfit-gym-pro'),
        'desc' => __('[whychooseus icon="ADD IMAGE ICON HERE" title="TITLE HERE" description="DESCRIPTION HERE" link="LINK URL"]', 'crossfit-gym-pro'),
        'type' => 'info');

    $options[] = array(
        'name' => __('Weight Lose Image', 'crossfit-gym-pro'),
        'desc' => __('[weight-lose-img image="ADD IMAGE HERE"]', 'crossfit-gym-pro'),
        'type' => 'info');

    $options[] = array(
    'name' => __('Our Achivement', 'crossfit-gym-pro'),
    'desc' => __('[our-achivement icon="ADD IMAGE ICON URL" title="TITLE HERE" link="#"]', 'crossfit-gym-pro'),
    'type' => 'info');

    $options[] = array(
        'name' => __('Weight Lose Image', 'crossfit-gym-pro'),
        'desc' => __('[fitness-class-image image="ADD IMAGE HERE"]', 'crossfit-gym-pro'),
        'type' => 'info');                

    $options[] = array(
		'name' => __('Our Team', 'crossfit-gym-pro'),
		'desc' => __('[our-team show="4"]', 'crossfit-gym-pro'),
		'type' => 'info');	
			
	$options[] = array(
		'name' => __('Testimonials Rotator', 'crossfit-gym-pro'),
		'desc' => __('[testimonials]', 'crossfit-gym-pro'),
		'type' => 'info');		
		          
    $options[] = array(
        'name' => __('Our Classes Slider', 'crossfit-gym-pro'),
        'desc' => __('[our_classes_slider][our_classes image="ADD IMAGE URL HERE" title="TITLE HERE" description="SHORT DESCRIPTION HERE" readmore="Read More" link="LINK URL"][/our_classes_slider]', 'crossfit-gym-pro'),
        'type' => 'info');      

	$options[] = array(
		'name' => __('Custom Video', 'crossfit-gym-pro'),
		'desc' => __('[custom-video youtubeid="enter here youtube id exa. EQDN49NBXEE" cover="enter here cover photo"]', 'crossfit-gym-pro'),
		'type' => 'info');		
 				
	$options[] = array(
		'name' => __('Our Services', 'crossfit-gym-pro'),
		'desc' => __('[our-sevices icon="ADD IMAGE ICON URL HERE" title="TITLE HERE" description="DESCRIPTION HERE" link="LINK URL"]', 'crossfit-gym-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Working Process', 'crossfit-gym-pro'),
		'desc' => __('[working-process number="01" image="ADD IMAGE URL HER" title="TITLE HERE" description="DESCRIPTION HERE" link="#" color="#ffffff"]', 'crossfit-gym-pro'),
		'type' => 'info');
		
    $options[] = array(
        'name' => __('Fitness Yoga Class', 'crossfit-gym-pro'),
        'desc' => __('[fitness_yoga image="IMAGE URL HERE" icon="IMAGE ICON URL HERE" title="TITLE HERE" description="SHORT DESCRIPTION HERE" link="#"]', 'crossfit-gym-pro'),
        'type' => 'info'); 
				
	$options[] = array(
		'name' => __('Contact information', 'crossfit-gym-pro'),
		'desc' => __('[contactinfo image="" icon="IMAGE ICON URL HERE" title="TITLE HERE" info="ADD INFO HERE" bgcolor="#efbf01" color="#ffffff"]', 'crossfit-gym-pro'),
		'type' => 'info');
 
	$options[] = array(
		'name' => __('Latest News', 'crossfit-gym-pro'),
		'desc' => __('[latest-news showposts="4" date="show" comment="hide" author="hide" title="TITLE ADD HERE" subtitle="SUBTITLE ADD HERE"]', 'crossfit-gym-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Pricing Table', 'crossfit-gym-pro'),
		'desc' => __('[pricing_table columns="3"]
    [price_column highlight="no" bgcolor="#f6f6f6" image="ADD IMAGE URL HERE"]    
        [package_price month="Monthly"]$35[/package_price]
        [price_header]Standard[/price_header]
        [price_row]5Personal Trainer[/price_row]
        [price_row]Special Meditation[/price_row]
        [price_row]Using all Tools[/price_row]
        [price_row]24 Hour Services[/price_row]
        [price_footer link="#1"]JOIN TODAY[/price_footer]   
    [/price_column]
    [price_column highlight="yes" bgcolor="#000000" image="ADD IMAGE URL HERE"]   
        [package_price month="Monthly"]$40[/package_price]
        [price_header]Premium[/price_header]
        [price_row]5Personal Trainer[/price_row]
        [price_row]Special Meditation[/price_row]
        [price_row]Using all Tools[/price_row]
        [price_row]24 Hour Services[/price_row]
        [price_footer link="#2"]JOIN TODAY[/price_footer]
    [/price_column]
    [price_column highlight="no" bgcolor="#f6f6f6" image="ADD IMAGE URL HERE"]    
        [package_price month="Monthly"]$48[/package_price]
        [price_header]Platinum[/price_header]
        [price_row]5Personal Trainer[/price_row]
        [price_row]Special Meditation[/price_row]
        [price_row]Using all Tools[/price_row]
        [price_row]24 Hour Services[/price_row]
        [price_footer link="#3"]JOIN TODAY[/price_footer]
    [/price_column]
[/pricing_table]', 'crossfit-gym-pro'),
		'type' => 'info');				
		
	$options[] = array(
		'name' => __('Opening Hours', 'crossfit-gym-pro'),
		'desc' => __('[opening-hours day="MON" time="09:00 - 19:00"]', 'crossfit-gym-pro'),
		'type' => 'info');			
		
	$options[] = array(
		'name' => __('Custom Button', 'crossfit-gym-pro'),
		'desc' => __('[button align="center" name="View Gallery" link="#" target=""]', 'crossfit-gym-pro'),
		'type' => 'info');		
		
	$options[] = array(
		'name' => __('Search Form', 'crossfit-gym-pro'),
		'desc' => __('[searchform]', 'crossfit-gym-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Social Icons ( Note: More social icons can be found at: https://fontawesome.com/icons)', 'crossfit-gym-pro'),
		'desc' => __('[social_area]<br />
			[social icon="fab fa-facebook-f" link="#"]<br />
			[social icon="fab fa-twitter" link="#"]<br />
			[social icon="fab fa-linkedin-in" link="#"]<br />
			[social icon="fab fa-instagram" link="#"]<br />
		[/social_area]', 'crossfit-gym-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('2 Column Content', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[column_content type="one_half"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_half_last"]
	Column 2 Content goes here...
[/column_content]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('3 Column Content', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[column_content type="one_third"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_third"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_third_last"]
	Column 3 Content goes here...
[/column_content]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('4 Column Content', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[column_content type="one_fourth"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fourth"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fourth"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fourth_last"]
	Column 4 Content goes here...
[/column_content]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('5 Column Content', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[column_content type="one_fifth"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fifth"]
	Column 4 Content goes here...
[/column_content]

[column_content type="one_fifth_last"]
	Column 5 Content goes here...
[/column_content]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Tabs', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[tabs]
	[tab title="TAB TITLE 1"]
		TAB CONTENT 1
	[/tab]
	[tab title="TAB TITLE 2"]
		TAB CONTENT 2
	[/tab]
	[tab title="TAB TITLE 3"]
		TAB CONTENT 3
	[/tab]
[/tabs]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Toggle Content', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[toggle_content title="Toggle Title 1"]
	Toggle content 1...
[/toggle_content]
[toggle_content title="Toggle Title 2"]
	Toggle content 2...
[/toggle_content]
[toggle_content title="Toggle Title 3"]
	Toggle content 3...
[/toggle_content]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');


		
	$options[] = array(
		'name' => __('Clear', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[clear]
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('HR / Horizontal separation line', 'crossfit-gym-pro'),
		'desc' => __('<pre>
[hr] or &lt;hr&gt;
</pre>', 'crossfit-gym-pro'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Subtitle', 'crossfit-gym-pro'),
		'desc' => __('[subtitle color="#111111" size="15px" margin="0 0 50px 0" align="" description="short descriptio here"]', 'crossfit-gym-pro'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Scroll to Top', 'crossfit-gym-pro'),
		'desc' => __('[back-to-top] 
', 'crossfit-gym-pro'),
		'type' => 'info');

	return $options;
}