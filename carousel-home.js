const track = document.getElementById("carouselTrack");
const cards = document.querySelectorAll(".team-card");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

let index = 0;

function getVisibleCards() {
  return window.innerWidth >= 992 ? 3 : 1;
}
function updateSlide() {
  const visible = getVisibleCards();
  const maxIndex = cards.length - visible;

  index = Math.max(0, Math.min(index, maxIndex));

  const cardWidth = cards[0].offsetWidth;
  const gap = 12;

  track.style.transform = `translateX(-${index * (cardWidth + gap)}px)`;
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
