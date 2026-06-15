const track = document.getElementById("carouselTrack");
const cards = document.querySelectorAll(".team-card");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

let index = 0;

function getVisibleCards() {
  return window.innerWidth >= 992 ? 4 : 1;
}

function updateSlide() {
  const visible = getVisibleCards();
  const maxIndex = cards.length - visible;

  if (index > maxIndex) index = maxIndex;
  if (index < 0) index = 0;

  const movePercent = (100 / visible) * index;
  track.style.transform = `translateX(-${movePercent}%)`;
}

nextBtn.addEventListener("click", () => {
  index++;
  updateSlide();
});

prevBtn.addEventListener("click", () => {
  index--;
  updateSlide();
});

window.addEventListener("resize", updateSlide);

updateSlide();
