let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(47.278798500028145, 27.4269564466803),
    zoom: 18,
    mapTypeId: 'satellite'
  });

  const iconBase =
    "../assets/icons/";
  const icons = {
    chair: {
      icon: iconBase + "map-chair.svg",
    },
    house: {
      icon: iconBase + "map-house.svg",
    },
  };
  const features = [{
      position: new google.maps.LatLng(47.2791064233005, 27.426087052570015),
      type: "chair",
      name: "Loc 4",
      slug: "L4"
    },
    {
      position: new google.maps.LatLng(47.27860321803863, 27.42821600790858),
      type: "house",
      name: "Casa 2",
      slug: "C2"
    },
    {
      position: new google.maps.LatLng(47.2790321803863, 27.42821600790858),
      type: "house",
      name: "Casa 3",
      slug: "C3"
    },
  ];
  // Create markers.

  for (let i = 0; i < features.length; i++) {
    const marker = new google.maps.Marker({
      position: features[i].position,
      icon: icons[features[i].type].icon,
      map: map
    });

    marker.addListener("click", () => {
      addSpot(features[i]);
    });
  }
}

window.initMap = initMap;

///form Data
let spots = [];
function addSpot(spot) {
  let spotExists = false;
  spots.forEach(el => {
    if(el.slug === spot.slug) {
      spotExists = true;
      return;
    }
  });
  if(!spotExists) {
    //show delete spots toggle
    const deleteToggle = document.querySelector('.home-book__delete-spots');
    deleteToggle.classList.remove('display-none');

    spots.push(spot);
    addSpotElement(spot);
  }
}

const spotsContainer = document.querySelector('.home-book__spots');

const editSpotsToggle = document.querySelector('.home-book__delete-spots');
let editMode = false;
editSpotsToggle.addEventListener('click', () => {
  if(editMode) {
    editSpotsToggle.classList.remove('home-book__delete-spots--active');
    spotsContainer.classList.remove('home-book__spots--delete');
    editMode = false;
  } else {
    editSpotsToggle.classList.add('home-book__delete-spots--active');
    spotsContainer.classList.add('home-book__spots--delete');
    editMode = true;
  }
});

function generateSpotsInputText() {
  let value = "";
  spots.forEach(spot => {
    value = value + spot.slug
    value = value + ",";
  });
  value = value.slice(0, -1);
  document.querySelector('input#spots').value = value;
}

function addSpotElement(spot) {
  let newEl = document.createElement('div');
  newEl.classList.add('home-book__spot');
  newEl.innerHTML = spot.name;
  newEl.id = `spot-${spot.slug}`;

  spotsContainer.appendChild(newEl);
  generateSpotsInputText();

  //remove spot on click
  newEl.addEventListener('click', () => {
    if(editMode) {
      newEl.remove();
      spots.forEach((item, i) => {
        if(item.slug === spot.slug) {
          spots.splice(i, 1);
        }
      });
      generateSpotsInputText();
    }
  });
}

//change booking type

const bookTypeDay = document.querySelector('#home-book-day');
const bookTypeDays = document.querySelector('#home-book-days');

bookTypeDay.addEventListener('click', () => toggleMultipleDaysInput('day'));
bookTypeDays.addEventListener('click', () => toggleMultipleDaysInput('days'));

function toggleMultipleDaysInput(type) {
  if(type === 'day') {
    document.querySelector('#home-book-end-date').classList.add('display-none');
    document.querySelector('#home-book-fishermen').classList.add('display-none');
    bookTypeDay.classList.add('active-type-toggle');
    bookTypeDays.classList.remove('active-type-toggle');
  } else {
    document.querySelector('#home-book-end-date').classList.remove('display-none');
    document.querySelector('#home-book-fishermen').classList.remove('display-none');
    bookTypeDay.classList.remove('active-type-toggle');
    bookTypeDays.classList.add('active-type-toggle');
  }
}

//set default min date for inputs
const startDateInput = document.getElementById('from_date');
const endDateInput = document.getElementById('to_date');

let today = new Date();
let startDateMin = today.setDate(today.getDate() + 1);
let endDateMin = today.setDate(today.getDate() + 1);

Date.prototype.formatMMDDYYYY = function(){
  return (this.getMonth() + 1) +
  "/" +  this.getDate() +
  "/" +  this.getFullYear();
};
