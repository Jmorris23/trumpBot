<?php
$botId = "<BOT_ID>";

$post = file_get_contents('php://input');
$json = json_decode($post);
$text = $json->{'text'};
$name = $json->{'name'};
$quotes = array(
  "\"I don't want to use the word 'screwed', but I screwed him\"",
  "\"Why doesn't he show his birth certificate\"",
  "\"I'm starting to wonder myself whether he was born in this country\"",
  "\"Maybe it says he's a Muslim\"",
  "\"The U.S. has become a dumping ground\"",
  "\"Some, I assume, are good people\"",
  "\"It was a great night for Mexico\"",
  "\"I have a great relationship with the blacks\"",
  "\"Laziness is a trait in blacks\"",
  "\"All of the women on The Apprentice flirted with me\"",
  "\"She talks like a truck driver\"",
  "\"We need global warming\"",
  "\"To the victor belong the spoils\"",
  "\"Stay and we keep the oil\"",
  "\"My I.Q. is one of the highest\"",
  "\"Please don't feel so stupid or insecure\"",
  "\"People are praying for me\"",
  "\"Spread it out in small doses\"",
  "\"I'm the best 140 character writer in the world\"",
  "\"My twitter has become so powerful\"",
  "\"I am the only person who immediately walked out of my 'Ali G' interview\"",
  "\"The concept of global warming was created by and for the Chinese\"",
  "\"Why is Obama playing basketball today\"",
  "\"@BetteMidler is an extremely unattractive woman\"",
  "\"I promise not to talk about your massive plastic surgeries\"",
  "\"You won't see another black president for generations\"",
  "\"I am the least racist person\"",
  "\"The line of 'Make America great again,' the phrase, that was mine\"",
  "\"Because I don't want to, Greta\"",
  "\"Did you notice that baby was crying through half of the speech and I didn’t get angry?\"",
  "\"That baby was driving me crazy\"",
  "\"My net worth is many, many, many times Mitt Romney\"",
  "\"Our planet is freezing\"",
  "\"I'm more honest and my women are more beautiful\"",
  "\"A lot of people are switching to these really long putters, very unattractive\"",
  "\"Somebody's doing the raping\"",
  "\"I have so many websites\"",
  "\"I will be the greatest jobs president that God ever created\"",
  "\"We have stupid people\"",
  "\"I beat China all the time\"",
  "\"When did we beat Japan at anything?\"",
  "\"When was the last time you saw a Chevrolet in Tokyo?\"",
  "\"I think I am a nice person\"",
  "\"Nobody builds walls better than me\"",
  "\"I promise I will never be in a bicycle race\"",
  "\"The American dream is dead\"",
);

if($name !== "TrumpBot"){
	if (stripos($text,'Trump') !== false){
		$r = rand(0,45);
	$quote = $quotes[$r];
		$fields = array(
			'text' => $quote,
			'bot_id' => $botId
		);

		$response = http_post_fields("https://api.groupme.com/v3/bots/post",$fields);
	}

}
?>
