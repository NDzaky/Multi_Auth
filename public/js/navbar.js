let bar = Array.from(document.querySelectorAll("li"));

bar.forEach(function(it) {
  it.onclick = function() {
    bar.forEach(function(el) {
      el.classList.remove("active");
    });
    this.classList.toggle("active");
  };
});