$(document).ready(function() {
	$('#bet-form a#btn_blace_bet').click(function() {
		var bet_amount = $(this).parent().parent().find('div.stake input#bet_amount').val();
		if (bet_amount >= 0) {
			var odds = $(this).parent().parent().find('div.odd_vote span.odd_number').text();

			if (parseInt($('span.balance_number').text(), 10) - bet_amount >= 0) {
				//set previous bet
				var previous_bet = $(this).parent().parent().find('div.stake input.previous_bet');
				var currentBet = bet_amount - $(previous_bet).val();
				$(previous_bet).val(bet_amount);
				var currentBalance = parseInt($('span.balance_number').text(), 10) - currentBet;
				$('span.balance_number').text(currentBalance);
				var returnNum = currentBet * odds;

				var currentReturnNum = parseInt($('span.return_number').text(), 10) + returnNum;
				$('span.return_number').text(currentReturnNum);
			} else {
				alert('You don\'t have enough Zenny');
			}
		} else {
			alert('You can not bet with negative number');
		}
	});
});
