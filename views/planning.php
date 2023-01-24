<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advise-It! Planning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div class="container text-center">
    <h1>Advise-It Planning</h1>
    <h2>Plan ID: {{@plan_id}}</h2>
    <h2>Last update was made on: <span id="date">{{@date}} UTC</span></h2>
    <form id="planForm" method="post">
        <label for="advisor">Advisor: </label>
        <input type="text" id="advisor" name="advisor" value="{{@advisor}}">
        <div class="card-deck">
            <div class="col">
                <div class="card my-3">
                    <div class="card-body justify-content-center">
                        <h5 class="card-title">Fall</h5>
                        <textarea id="fall" name="fall">{{@fall}}</textarea>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Winter</h5>
                        <textarea id="winter" name="winter">{{@winter}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Spring</h5>
                        <textarea id="spring" name="spring">{{@spring}}</textarea>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Summer</h5>
                        <textarea id="summer" name="summer">{{@summer}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" form="planForm" class="btn-primary rounded w-25 mb-4 shadow-lg">Submit Plan</button>
    </form>
    <button id="print" onclick="window.print()" class="btn-primary rounded w-25 mb-4 shadow-lg">Print</button>
</div>

  <div class="modal fade" id="confirmModal">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Plan has been saved.</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <p class="m-4">Thank you for using Advise-It. Your plan was saved at: <b><span id="modalDate"></span></b></p>
          </div>
      </div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

    $("#planForm").submit(function (e)
    {
        e.preventDefault();

        let form = $(this);
        console.log("planId={{@plan_id}}&".concat(form.serialize()));
        $.ajax
        ({
            type: "POST",
            url: "model/saveplan.php",
            data: "planId={{@plan_id}}&".concat(form.serialize()),
            success: function (result) {
                console.log(result);
                result = result.concat(" UTC");
                $("#date").html(result);
                $("#modalDate").html(result);
                $("#confirmModal").modal("toggle");
            }
        })
    })
</script>
</body>
</html>