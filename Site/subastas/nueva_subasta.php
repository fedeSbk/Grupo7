<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.2.3/milligram.min.css">
  </head>
  <body class="container" style="padding-top: 3%;">
    <h2><a href="index.html">subasta</a></h2>

    <hr />

    <div class="row">
      <div class="column">
        <label>Beneficiary</label>
        <blockquote><p><em id="beneficiary">Loading..</em><br /><br /></p></blockquote>
      </div>
      <div class="column">
        <label>Raised</label>
        <blockquote><p><em><span id="raised">Loading..</span><br />ETH</em></p></blockquote>
      </div>
      <div class="column">
        <label>Timeleft</label>
        <blockquote><p><em id="timeleft"><script language="JavaScript" src="https://scripts.hashemian.com/js/countdown.js"></script>
        <script language="JavaScript">
TargetDate = "06/06/2019 5:00 AM";
BackColor = "palegreen";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
FinishMessage = "It is finally here!";</em><br />seconds</p></blockquote>

</script>

      </div>
      <div class="column">
        <label>Highest Bidder</label>
        <blockquote><p><em><span id="highestBidder"></span><br />
        <span id="highestBid"></span> ETH</em></p></blockquote>
      </div>
      <div class="column">
        <label>Your Account<label>
        <blockquote><p><em id="accountAddress">Loading..</em><br /><br /></p></blockquote>
      </div>
      <div class="column">
        <label>Balance</label>
        <blockquote><p><em id="accountBalance">Loading..</em><br />ETH</p></blockquote>
      </div>
    </div>

    <hr />

    <div class="row">
      <div class="column column-33">
        <label>From Account</label>
        <select id="bidAccount">
        </select>
      </div>
      <div class="column column-25">
        <label>Bid Amount</label>
        <input type="number" id="bidAmount" placeholder="28300 ether">
      </div>
      <div class="column column-25">
        <label><br /></label>
        <button id="makeBid">Bid</button>
      </div>
    </div>

    <hr />

    <button id="endAuction" disabled="disabled">End Auction</button>

    <br /><br />

    <div id="response"></div>

    <script type="text/javascript" src="ethereumjs-testrpc.js"></script>
    <script type="text/javascript" src="ethjs.js"></script>
    <script type="text/javascript">
      var eth = new Eth(TestRPC.provider());
      var el = function(id){ return document.querySelector(id); };
      /*
      // uncomment to enable MetaMask support:
      if (typeof window.web3 !== 'undefined' && typeof window.web3.currentProvider !== 'undefined') {
        eth.setProvider(window.web3.currentProvider);
      } else {
        eth.setProvider(provider); // set to TestRPC if not available
      }
      */
      eth.accounts().then(function(accounts) {
        accounts.forEach(function(address){
          bidAccount.innerHTML += '<option value="' + address + '">'
            + address + '</option>';
        });
        el('#accountAddress').innerHTML = accounts[0].substr(0, 12);
        var SimpleAuctionBytecode = '60606040523461000057604051604080610621833981016040528080519060200190919080519060200190919050505b80600060006101000a81548173ffffffffffffffffffffffffffffffffffffffff02191690836c0100000000000000000000000090810204021790555042600181905550816002819055505b50505b6105958061008c6000396000f360606040523615610086576000357c0100000000000000000000000000000000000000000000000000000000900480631998aeef1461008b5780632a24f46c1461009557806338af3eed146100a45780633ccfd60b146100dd5780634f245ef71461010257806391f9015714610125578063d074a38d1461015e578063d57bde7914610181575b610000565b6100936101a4565b005b34610000576100a2610301565b005b34610000576100b1610450565b604051808273ffffffffffffffffffffffffffffffffffffffff16815260200191505060405180910390f35b34610000576100ea610476565b60405180821515815260200191505060405180910390f35b346100005761010f61055d565b6040518082815260200191505060405180910390f35b3461000057610132610563565b604051808273ffffffffffffffffffffffffffffffffffffffff16815260200191505060405180910390f35b346100005761016b610589565b6040518082815260200191505060405180910390f35b346100005761018e61058f565b6040518082815260200191505060405180910390f35b600254600154014211156101b757610000565b600454341115156101c757610000565b6000600360009054906101000a900473ffffffffffffffffffffffffffffffffffffffff1673ffffffffffffffffffffffffffffffffffffffff161415156102655760045460056000600360009054906101000a900473ffffffffffffffffffffffffffffffffffffffff1673ffffffffffffffffffffffffffffffffffffffff168152602001908152602001600020600082825401925050819055505b33600360006101000a81548173ffffffffffffffffffffffffffffffffffffffff02191690836c01000000000000000000000000908102040217905550346004819055507ff4757a49b326036464bec6fe419a4ae38c8a02ce3e68bf0809674f6aab8ad3003334604051808373ffffffffffffffffffffffffffffffffffffffff1681526020018281526020019250505060405180910390a15b565b600254600154014211151561031557610000565b600660009054906101000a900460ff161561032f57610000565b6001600660006101000a81548160ff02191690837f01000000000000000000000000000000000000000000000000000000000000009081020402179055507fdaec4582d5d9595688c8c98545fdd1c696d41c6aeaeb636737e84ed2f5c00eda600360009054906101000a900473ffffffffffffffffffffffffffffffffffffffff16600454604051808373ffffffffffffffffffffffffffffffffffffffff1681526020018281526020019250505060405180910390a1600060009054906101000a900473ffffffffffffffffffffffffffffffffffffffff1673ffffffffffffffffffffffffffffffffffffffff166108fc6004549081150290604051809050600060405180830381858888f19350505050151561044d57610000565b5b565b600060009054906101000a900473ffffffffffffffffffffffffffffffffffffffff1681565b60006000600560003373ffffffffffffffffffffffffffffffffffffffff1681526020019081526020016000205490506000811115610554576000600560003373ffffffffffffffffffffffffffffffffffffffff168152602001908152602001600020819055503373ffffffffffffffffffffffffffffffffffffffff166108fc829081150290604051809050600060405180830381858888f1935050505015156105535780600560003373ffffffffffffffffffffffffffffffffffffffff1681526020019081526020016000208190555060009150610559565b5b600191505b5090565b60015481565b600360009054906101000a900473ffffffffffffffffffffffffffffffffffffffff1681565b60025481565b6004548156';
        var SimpleAuctionABI = [{"constant":false,"inputs":[],"name":"bid","outputs":[],"payable":true,"type":"function"},{"constant":false,"inputs":[],"name":"auctionEnd","outputs":[],"payable":false,"type":"function"},{"constant":true,"inputs":[],"name":"beneficiary","outputs":[{"name":"","type":"address"}],"payable":false,"type":"function"},{"constant":false,"inputs":[],"name":"withdraw","outputs":[{"name":"","type":"bool"}],"payable":false,"type":"function"},{"constant":true,"inputs":[],"name":"auctionStart","outputs":[{"name":"","type":"uint256"}],"payable":false,"type":"function"},{"constant":true,"inputs":[],"name":"highestBidder","outputs":[{"name":"","type":"address"}],"payable":false,"type":"function"},{"constant":true,"inputs":[],"name":"biddingTime","outputs":[{"name":"","type":"uint256"}],"payable":false,"type":"function"},{"constant":true,"inputs":[],"name":"highestBid","outputs":[{"name":"","type":"uint256"}],"payable":false,"type":"function"},{"inputs":[{"name":"_biddingTime","type":"uint256"},{"name":"_beneficiary","type":"address"}],"payable":false,"type":"constructor"},{"anonymous":false,"inputs":[{"indexed":false,"name":"bidder","type":"address"},{"indexed":false,"name":"amount","type":"uint256"}],"name":"HighestBidIncreased","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"name":"winner","type":"address"},{"indexed":false,"name":"amount","type":"uint256"}],"name":"AuctionEnded","type":"event"}];
        var SimpleAuction = eth.contract(SimpleAuctionABI, SimpleAuctionBytecode, { from: accounts[0], gas: 3000000 });
        var simpleAuctionInstance;
        var beneficiary = accounts[0];
        var biddingTime = 300; // 15 thousand seconds
        // poll for new auction data
        var auctionInterval = setInterval(function updateAuctionHTML() {
          if (!simpleAuctionInstance) { return; }
          eth.getBalance(accounts[0]).then(function(balance){
            el('#accountBalance').innerHTML = Eth.fromWei(balance, 'ether');
          });
          eth.getBalance(simpleAuctionInstance.address).then(function(auctionBalance){
            el('#raised').innerHTML = Eth.fromWei(auctionBalance, 'ether');
          });
          simpleAuctionInstance.beneficiary().then(function(beneficiary){
            el('#beneficiary').innerHTML = beneficiary[0].substr(0, 12);
          });
          simpleAuctionInstance.highestBidder().then(function(highestBidder){
            el('#highestBidder').innerHTML = highestBidder[0].substr(0, 12);
          });
          simpleAuctionInstance.highestBid().then(function(highestBid){
            el('#highestBid').innerHTML = Eth.fromWei(highestBid[0], 'ether');
          });
          simpleAuctionInstance.auctionStart().then(function(auctionStart){
            simpleAuctionInstance.biddingTime().then(function(biddingTime){
              var timeleft = (auctionStart[0].add(biddingTime[0]))
              .sub(new Eth.BN((new Date()).getTime() / 1000));
              el('#timeleft').innerHTML = timeleft.toString(10);
              // time left is less than or equal to (lte) 0
              if (timeleft.lte(0)) {
                clearInterval(auctionInterval);
                el('#endAuction').disabled = '';
              }
            });
          });
        }, 600);
        SimpleAuction.new(biddingTime, beneficiary, function(deployError, deployTxHash){
          if (deployError) {
            el('#response').innerHTML = 'Hmm, there was an error: ' + String(deployError);
          }
          var checkTransaction = setInterval(function(){
            eth.getTransactionReceipt(deployTxHash).then(function(receipt){
              if (receipt) {
                clearInterval(checkTransaction);
                simpleAuctionInstance = SimpleAuction.at(receipt.contractAddress);
                el('#makeBid').addEventListener('click', function(){
                  var bidTxObject = {
                    from: el('#bidAccount').value,
                    value: Eth.toWei(el('#bidAmount').value, 'ether'),
                  };
                  el('#response').innerHTML = 'Placing bid..';
                  simpleAuctionInstance.bid(bidTxObject, function(bidError, bidResult){
                    if (bidError) {
                      el('#response').innerHTML = 'Hmm, there was an error' + String(bidError);
                    } else {
                      el('#response').innerHTML = 'Making bid with tx hash: ' + String(bidResult);
                    }
                  });
                });
                el('#endAuction').addEventListener('click', function(){
                  el('#response').innerHTML = 'Ending auction...';
                  simpleAuctionInstance.endAuction(function(endError, endResult){
                    if (endError) {
                      el('#response').innerHTML = 'Hmm, there was an error' + String(endError);
                    } else {
                      el('#response').innerHTML = 'Ending auction with tx hash: ' + String(endResult);
                    }
                  });
                });
              }
            });
          }, 400);
        });
      });
    </script>

    <pre><code>
pragma solidity ^0.4.0;

contract SimpleAuction {
  // Parameters of the auction. Times are either
  // absolute unix timestamps (seconds since 1970-01-01)
  // or time periods in seconds.
  address public beneficiary;
  uint public auctionStart;
  uint public biddingTime;

  // Current state of the auction.
  address public highestBidder;
  uint public highestBid;

  // Allowed withdrawals of previous bids
  mapping(address => uint) pendingReturns;

  // Set to true at the end, disallows any change
  bool ended;

  // Events that will be fired on changes.
  event HighestBidIncreased(address bidder, uint amount);
  event AuctionEnded(address winner, uint amount);

  // The following is a so-called natspec comment,
  // recognizable by the three slashes.
  // It will be shown when the user is asked to
  // confirm a transaction.

  /// Create a simple auction with `_biddingTime`
  /// seconds bidding time on behalf of the
  /// beneficiary address `_beneficiary`.
  function SimpleAuction(
      uint _biddingTime,
      address _beneficiary
  ) {
    beneficiary = _beneficiary;
    auctionStart = now;
    biddingTime = _biddingTime;
  }

  /// Bid on the auction with the value sent
  /// together with this transaction.
  /// The value will only be refunded if the
  /// auction is not won.
  function bid() payable {
    // No arguments are necessary, all
    // information is already part of
    // the transaction. The keyword payable
    // is required for the function to
    // be able to receive Ether.
    if (now > auctionStart + biddingTime) {
      // Revert the call if the bidding
      // period is over.
      throw;
    }
    if (msg.value <= highestBid) {
      // If the bid is not higher, send the
      // money back.
      throw;
    }
    if (highestBidder != 0) {
      // Sending back the money by simply using
      // highestBidder.send(highestBid) is a security risk
      // because it can be prevented by the caller by e.g.
      // raising the call stack to 1023. It is always safer
      // to let the recipient withdraw their money themselves.
      pendingReturns[highestBidder] += highestBid;
    }
    highestBidder = msg.sender;
    highestBid = msg.value;
    HighestBidIncreased(msg.sender, msg.value);
  }

  /// Withdraw a bid that was overbid.
  function withdraw() returns (bool) {
    var amount = pendingReturns[msg.sender];
    if (amount > 0) {
      // It is important to set this to zero because the recipient
      // can call this function again as part of the receiving call
      // before `send` returns.
      pendingReturns[msg.sender] = 0;

      if (!msg.sender.send(amount)) {
        // No need to call throw here, just reset the amount owing
        pendingReturns[msg.sender] = amount;
        return false;
      }
    }
    return true;
  }

  /// End the auction and send the highest bid
  /// to the beneficiary.
  function auctionEnd() {
    // It is a good guideline to structure functions that interact
    // with other contracts (i.e. they call functions or send Ether)
    // into three phases:
    // 1. checking conditions
    // 2. performing actions (potentially changing conditions)
    // 3. interacting with other contracts
    // If these phases are mixed up, the other contract could call
    // back into the current contract and modify the state or cause
    // effects (ether payout) to be perfromed multiple times.
    // If functions called internally include interaction with external
    // contracts, they also have to be considered interaction with
    // external contracts.

    // 1. Conditions
    if (now <= auctionStart + biddingTime)
      throw; // auction did not yet end
    if (ended)
      throw; // this function has already been called

    // 2. Effects
    ended = true;
    AuctionEnded(highestBidder, highestBid);

    // 3. Interaction
    if (!beneficiary.send(highestBid))
      throw;
  }
}
  </code></pre>