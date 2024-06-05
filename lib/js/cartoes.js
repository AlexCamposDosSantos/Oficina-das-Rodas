document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.card-value');
    const speed = 200;

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;

        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 300);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    });
  });