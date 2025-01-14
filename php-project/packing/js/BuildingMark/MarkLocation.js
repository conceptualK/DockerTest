// Load PictureMove.js and then execute the code
$(document).ready(function () {
  $("#fetchDataButton").click(function () {
    const palletId = $("#palletIdInput").val();

    if (!palletId) {
      $("#map").empty();

      $("#alert").removeClass("d-none");
      document.querySelector("#alert div").textContent =
        "Please enter a pallet ID.";
      setTimeout(function () {
        $("#alert").addClass("d-none");
      }, 5000);

      return;
    }

    $.ajax({
      url: "http://10.19.5.106:5001/api/fLocation",
      headers: { "Content-Type": "application/json" },
      type: "POST",
      dataType: "json",
      data: JSON.stringify({ palletId: palletId }),
      success: function (data) {
        console.log(data);
        $("#result").html(JSON.stringify(data, null, 2));

        const map = $("#map");
        map.empty();
        console.log(data.MsgResult);

        if (data.MsgResult == "00000") {
          try {
            var mapElement = document.getElementById("map");
            console.log(data.FL);
            switch (data.FL) {
              case "10":
                mapElement.style.backgroundImage = "url('js/BuildingMark/F1.jpg')";
                break;

              case "20":
                mapElement.style.backgroundImage = "url('js/BuildingMark/FL2.jpg')";
                break;

              case "25":
                mapElement.style.backgroundImage = "url('js/BuildingMark/F25.jpg')";

                break;
              case "WSR1":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R1.png')";
  
                break;
              case "WSR2":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R2.png')";
  
                break;

              case "WSR3":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R3.png')";
  
                break;
              case "WSR4":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R4.png')";
  
                break;
              case "WSR5":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R5.png')";
  
                break;
              case "WSR6":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R6.png')";
  
                break;
              case "WSR7":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R7.png')";
  
                break;
              case "WSR8":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R8.png')";
  
                break;
              case "WSR9":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R9.png')";
  
                break;
              case "WSR10":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R10.png')";
  
                break;
              case "WSR11":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R11.png')";
  
                break;
              case "WSR12":
                  mapElement.style.backgroundImage = "url('js/BuildingMark/R12.png')";
  
                break;
              default:
                mapElement.style.backgroundImage = "";
                break;
            }
            console.log(data.X);
            console.log(data.Y);
            Mark(data.X, data.Y, map);
          } catch (err) {
            console.log("Parameter not match", err);
            $("#result").html("Error: Parameter not match.");
          }
        } else {
          $("#alert").removeClass("d-none");
          document.querySelector("#alert div").textContent =
            "Pallet have location data more than one or Not have data";
          setTimeout(function () {
            $("#alert").addClass("d-none");
          }, 5000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error(textStatus, errorThrown);
        $("#result").html("Error: " + textStatus + " - " + errorThrown);
      },
    });
  });
});

function Mark(X, Y, map, color = "green") {
  // Clear existing markers
  map.find(".box").remove();
  console.log(X);
  // Convert X and Y to percentage based on map size
  const xPercent = (X / map.width()) * 100;
  const yPercent = (Y / map.height()) * 100;
  console.log(map.width());
  console.log(map.height());

  const marker = $("<div></div>")
    .addClass("box")
    .css({
      left: `${xPercent}%`,
      top: `${yPercent}%`,
      transform: "translate(-50%, -50%)", // Center the marker
      background : color
    });

  map.append(marker);
}
