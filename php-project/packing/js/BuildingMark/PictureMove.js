let currentOpenSlideOut = null; // เก็บ Slide-out ที่เปิดอยู่ปัจจุบัน

function toggleSlideOut(iID) {
  const slideOut = document.getElementById(`slideOut-${iID}`);

  // หากมี Slide-out อันอื่นที่เปิดอยู่ ให้ปิดมันก่อน
  if (currentOpenSlideOut && currentOpenSlideOut !== slideOut) {
    currentOpenSlideOut.classList.add("d-none");
  }

  // Toggle การแสดงของ Slide-out ปัจจุบัน
  const isHidden = slideOut.classList.toggle("d-none");

  // อัพเดท currentOpenSlideOut ถ้า Slide-out นี้ถูกเปิด
  currentOpenSlideOut = isHidden ? null : slideOut;
}
function updateTable() {
  const mapElement = $("#map");
  mapElement.find(".box").remove();
  var tableBody = $("#configTableBody");
  tableBody.empty();
}

function confirmDelete(iID) {
  $("#sucalert").removeClass("d-none");
  document.querySelector("#sucalert div").textContent =
    "Delet location successful.";
  setTimeout(function () {
    $("#sucalert").addClass("d-none");
  }, 5000);

  $.ajax({
    url: "http://10.19.5.106:5001/api/fDelLocation",
    headers: { "Content-Type": "application/json" },
    type: "POST",
    dataType: "json",
    data: JSON.stringify({ ID: iID }),
    success: function (data) {
      $("#result").html(JSON.stringify(data, null, 2));
      updateTable(); // อัปเดตตารางหลังจากลบข้อมูล
    },
    error: function (jqXHR, textStatus, errorThrown) {
   //   console.error(textStatus, errorThrown);
      $("#result").html("Error: " + textStatus + " - " + errorThrown);
    },
  });

  const slideOut = document.getElementById(`slideOut-${iID}`);
  slideOut.classList.add("d-none");
  currentOpenSlideOut = null; // รีเซ็ต currentOpenSlideOut เมื่อยกเลิก
}

function cancelDelete(iID) {
  //disableButtons(iID);
  const slideOut = document.getElementById(`slideOut-${iID}`);
  slideOut.classList.add("d-none");
  currentOpenSlideOut = null; // รีเซ็ต currentOpenSlideOut เมื่อยกเลิก
}

$(document).ready(function () {
  let relativeX = "";
  let relativeY = "";
  let selectedValue = null; // Store the selected value

  $("#saveButton").addClass("hidden");
  $("#firstDropdown").addClass("hidden");
  $("#inputField").addClass("hidden");
  $("#inputID").addClass("hidden");

  $("#addButton").click(function () {
    const map = $("#map");
    $("#saveButton").toggleClass("hidden show");
    $("#firstDropdown").toggleClass("hidden show");
    $("#inputField").toggleClass("hidden show");
    $("#inputID").toggleClass("hidden show");

    if ($("#saveButton").hasClass("hidden")) {
      map.find(".box").remove();
    }

    cFloor(); // Initialize the dropdown

    map.on("click", function (e) {
      const mapOffset = map.offset();
      relativeX = e.pageX - mapOffset.left;
      relativeY = e.pageY - mapOffset.top;

      if (
        relativeX >= 0 &&
        relativeY <= map.width() &&
        relativeY >= 0 &&
        relativeY <= map.height()
      ) {
        $("#x-value").text(relativeX.toFixed(2));
        $("#y-value").text(relativeY.toFixed(2));

        Marks(relativeX, relativeY, map);
      }
    });
  });

  $("#saveButton").click(function () {
    const Room = $("#inputField").val();
    const ID = $("#inputID").val();
  //  console.log("Selected room:", Room);

    if (!Room) {
      $("#map").empty();
      $("#alert").removeClass("d-none");
      document.querySelector("#alert div").textContent = "Please input a Room.";
      setTimeout(function () {
        $("#alert").addClass("d-none");
      }, 5000);
      return;
    }

    if (!ID) {
      $("#map").empty();
      $("#alert").removeClass("d-none");
      document.querySelector("#alert div").textContent = "Please input ID.";
      setTimeout(function () {
        $("#alert").addClass("d-none");
      }, 5000);

      return;
    }

    cFloor();
   // console.log("The selected value after function call:", selectedValue);
    if (relativeX !== "" && relativeY !== "") {
      const data = JSON.stringify({
        X_Bar: relativeX.toFixed(2),
        Y_Bar: relativeY.toFixed(2),
        FL: selectedValue,
        RM: Room,
        ID: ID,
      })
      console.log(data);
      $.ajax({
        url: "http://10.19.5.106:5001/api/mark",
        headers: { "Content-Type": "application/json" },
        type: "POST",
        dataType: "json",
        data: data,
        success: function (data) {
     //     console.log(data);
          $("#result").html(JSON.stringify(data, null, 2));

          if (data.MsgResult == "00001") {
            $("#alert").removeClass("d-none");
            document.querySelector("#alert div").textContent =
              "Mark location fail";
            setTimeout(function () {
              $("#alert").addClass("d-none");
            }, 5000);
          } else {
            $("#saveButton").removeClass("show").addClass("hidden");
            $("#firstDropdown").removeClass("show").addClass("hidden");
            $("#inputField").removeClass("show").addClass("hidden");
            $("#inputID").removeClass("show").addClass("hidden");

            $("#sucalert").removeClass("d-none");
            document.querySelector("#sucalert div").textContent =
              "Add location successful.";
            setTimeout(function () {
              $("#sucalert").addClass("d-none");
            }, 5000);

            $("#saveButton").addClass("hidden");
            $("#firstDropdown").addClass("hidden");
            $("#inputField").addClass("hidden");
          }
          $("#map").empty();
          $("#inputField").val("");
          relativeX = "";
          relativeY = "";
        },
        error: function (jqXHR, textStatus, errorThrown) {
        //  console.error(textStatus, errorThrown);
          $("#result").html("Error: " + textStatus + " - " + errorThrown);
        },
      });
    } else {
      $("#alert").removeClass("d-none");
      document.querySelector("#alert div").textContent =
        "No coordinates selected";
      setTimeout(function () {
        $("#alert").addClass("d-none");
      }, 5000);
    }
  });

  function Mark(X, Y, map, color = "yellow") {
    const xPercent = (X / map.width()) * 100;
    const yPercent = (Y / map.height()) * 100;

    const marker = $("<div></div>")
      .addClass("box")
      .css({
        left: `${xPercent}%`,
        top: `${yPercent}%`,
        transform: "translate(-50%, -50%)",
        background : color
      });

    map.append(marker);
  }

  function Marks(X, Y, map, color = "red") {
    map.find(".box").remove();
    const xPercent = (X / map.width()) * 100;
    const yPercent = (Y / map.height()) * 100;

    const marker = $("<div></div>")
      .addClass("box")
      .css({
        left: `${xPercent}%`,
        top: `${yPercent}%`,
        transform: "translate(-50%, -50%)",
        background : color
      });

    map.append(marker);
  }

  function cFloor() {
    const firstOptions = [10, 20, 25, 'WSR1', 'WSR2', 'WSR3', 'WSR4', 'WSR5' , 'WSR6', 'WSR7' , 'WSR8' , 'WSR9', 'WSR10', 'WSR11' , 'WSR12'];
    const firstDropdown = $("#firstDropdown");
    const mapElement = $("#map");

    // Clear any existing options and add the default "Select an option" prompt
    firstDropdown.empty();
    firstDropdown.append(
      '<option value="" disabled selected>Select an option</option>'
    );

    firstOptions.forEach((option) => {
      const opt = $("<option></option>").attr("value", option).text(option);
      firstDropdown.append(opt);
    });

    firstDropdown.on("change", function () {
      selectedValue = $(this).val(); // Update the selected value

      if (selectedValue == 20) {
        mapElement.css("background-image", "url('js/BuildingMark/FL2.jpg')");
        DMark();
      } else if (selectedValue == 10) {
        mapElement.css("background-image", "url('js/BuildingMark/F1.jpg')");
        DMark();
      } else if (selectedValue == 25) {
        mapElement.css("background-image", "url('js/BuildingMark/F25.jpg')");
        DMark();

      } else if (selectedValue == 'WSR1') {
        mapElement.css("background-image", "url('js/BuildingMark/R1.png')");
        DMark();

      } 
         else if (selectedValue == 'WSR2') {
        mapElement.css("background-image", "url('js/BuildingMark/R2.png')");
        DMark();

      }  
      
      else if (selectedValue == 'WSR3') {
        mapElement.css("background-image", "url('js/BuildingMark/R3.png')");
        DMark();

      } 

      else if (selectedValue == 'WSR4') {
        mapElement.css("background-image", "url('js/BuildingMark/R4.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR5') {
        mapElement.css("background-image", "url('js/BuildingMark/R5.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR6') {
        mapElement.css("background-image", "url('js/BuildingMark/R6.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR7') {
        mapElement.css("background-image", "url('js/BuildingMark/R7.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR8') {
        mapElement.css("background-image", "url('js/BuildingMark/R8.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR9') {
        mapElement.css("background-image", "url('js/BuildingMark/R9.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR10') {
        mapElement.css("background-image", "url('js/BuildingMark/R10.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR11') {
        mapElement.css("background-image", "url('js/BuildingMark/R11.png')");
        DMark();

      } 
      else if (selectedValue == 'WSR12') {
        mapElement.css("background-image", "url('js/BuildingMark/R12.png')");
        DMark();

      } 
      else {
        mapElement.css("background-image", "none");
      }

    //  console.log("Selected value:", selectedValue);
    });
  }

  function DMark() {
    $.ajax({
      url: "http://10.19.5.106:5001/api/fmark",
      headers: { "Content-Type": "application/json" },
      type: "POST",
      dataType: "json",
      data: JSON.stringify({ FL: selectedValue }),
      success: function (data) {
        $("#result").html(JSON.stringify(data, null, 2));

        const mapElement = $("#map");
        mapElement.find(".box").remove();
        var tableBody = $("#configTableBody");
        tableBody.empty(); // ล้างข้อมูลเก่าออก

        data.MarkLocation.forEach(function (location, index) {
          const x = location.X;
          const y = location.Y;
          const iID = location.ID;
          const iRM = location.ROOM;

       //   console.log(`X: ${x}, Y: ${y}, ID: ${iID}, ROOM: ${iRM}`);
          Mark(x, y, mapElement);

          var row = $("<tr>");

          row.append(
            $("<td>").html(`
                    <td>
                    <div class="btn-group custom-container-size" style="position: relative;">
                        <button onclick="toggleSlideOut('${iID}')" class='btn btn-danger custom-button-size'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button>
                        <div id="slideOut-${iID}" class="slide-out d-none">
                            <button class="btn btn-success" onclick="confirmDelete('${iID}', this)">OK</button>
                            <button class="btn btn-secondary" onclick="cancelDelete('${iID}', this)">Cancel</button>
                        </div>
                    </div>
                </td>
                    `)
          );
          row.append($("<td>").text(iID));
          row.append($("<td>").text(iRM));
          tableBody.append(row);
        });

        var rows = tableBody.find("tr");
        // เพิ่ม event listener ให้กับแต่ละแถว
        rows.each(function (index, row) {
          $(row).click(function () {
            var idValue = $(this).find("td:nth-child(2)").text(); // อ่านค่า ID จากเซลล์ที่ 2
            var rmValue = $(this).find("td:nth-child(3)").text(); // อ่านค่า RM จากเซลล์ที่ 3
            onlyMark(idValue);
            Getlist(idValue);

           // console.log(
         //     "คลิกแถว " + index + ": ID = " + idValue + ", RM = " + rmValue
          //  );
            // alert('คุณคลิกที่แถว: ID = ' + idValue + ', RM = ' + rmValue);
          });
        });

        const headers = tableBody.find("td");

        headers.each(function () {
          $(this).click(function () {
            var columnIndex = $(this).index();

            var cellText = $(this).closest("tr").find("td:nth-child(2)").text();

            if (columnIndex > 0) {
              document.getElementById("inputID").value = cellText;
              genqr();
            }
          });
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
      //  console.error(textStatus, errorThrown);
        $("#result").html("Error: " + textStatus + " - " + errorThrown);
      },
    });
  }

  function onlyMark(tID) {
    $.ajax({
      url: "http://10.19.5.106:5001/api/fOnlyMark",
      headers: { "Content-Type": "application/json" },
      type: "POST",
      dataType: "json",
      data: JSON.stringify({ ID: tID }),
      success: function (data) {
        //console.log(tID);

        $("#result").html(JSON.stringify(data, null, 2));

        const map = $("#map");
        map.empty();
      //  console.log("data.X " + data.X + "data.Y " + data.Y +"map "+ map);

        if (data.MsgResult == "00000") {
          try {
            Marks(data.X, data.Y, map);
          } catch (err) {
         //   console.log("Parameter not match", err);
            $("#result").html("Error: Parameter not match.");
          }
        } else {
          $("#alert").removeClass("d-none");
          document.querySelector("#alert div").textContent = "ID fail";
          setTimeout(function () {
            $("#alert").addClass("d-none");
          }, 5000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
       // console.error(textStatus, errorThrown);
        $("#result").html("Error: " + textStatus + " - " + errorThrown);
      },
    });
  }

  function Getlist(tID) {
    $.ajax({
      url: "http://10.19.5.106:5001/api/fCellData",
      headers: { "Content-Type": "application/json" },
      type: "POST",
      dataType: "json",
      data: JSON.stringify({ ID: tID }),
      success: function (data) {
      //  console.log(data);
        $("#result").html(JSON.stringify(data, null, 2));

        // var tableBody = $("#ResultTable");
        // tableBody.empty(); // Clear old data

        if (data.MarkLocation && data.MarkLocation.length > 0) {
          var item = data.MarkLocation;
        //  console.log(item);

          // // Destroy existing DataTable instance if it exists
          if ($.fn.DataTable.isDataTable("#ResultTable")) {
            $("#ResultTable").DataTable().destroy();
          }

          $("#ResultTable").DataTable({
            data: item,
            columns: [{ data: "PL" }, { data: "MD" }],
          });
        } else {
          // Show a message if there's no data
          var noDataRow = $("<tr>");
          noDataRow.append(
            $("<td>")
              .attr("colspan", 2)
              .text("No data available.")
              .css("text-align", "center")
          );
          tableBody.append(noDataRow);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
     //   console.error(textStatus, errorThrown);
        $("#result").html("Error: " + textStatus + " - " + errorThrown);
      },
    });
  }
});
