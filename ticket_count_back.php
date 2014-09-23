<html ng-app="backCounter">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
  <script type="text/javascript">
    var counter_module = angular.module('backCounter', [])
    counter_module.directive('myCurrentTime', ['$interval', 'dateFilter',
      function($interval, dateFilter) {
        return function(scope, element, attrs) {
          var delay, stopTime;
          var i = 0;

          function updateTime() {
            if (i <= delay) {
              element.text(delay - i);
              $('.progress-bar').attr('aria-valuenow', i)
              $('.progress-bar').css('width', (new String((100 / delay) * i)) + '%');
            } else {
              $('.counter').html('<a href="/" class="btn btn-primary close-button" id="#close_button"><?= defined("DELAY_SHIELD_CLOSE_BUTTON") ? DELAY_SHIELD_CLOSE_BUTTON : "Close and continue" ?></a>');
            }
            i += 1;
          }

          scope.$watch(attrs.myCurrentTime, function(value) {
            delay = value;
            updateTime();
          });

          stopTime = $interval(updateTime, 1000);

          element.on('$destroy', function() {
            $interval.cancel(stopTime);
          });
        }
      }]
     );
  </script>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <div class="alert alert-danger message" id="message">
              <?= DELAY_SHIELD_MESSAGE ?>
            </div>
            <div class="counter text-center">
              <h1 my-current-time="<?= DELAY_SHIELD_DELAY_IN_SECONDS ?>"></h1>
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" style="width: 0%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?= DELAY_SHIELD_DELAY_IN_SECONDS ?>" style="100%">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
