    const postButton = document.querySelector('.post-button');
    const modal = document.querySelector('.modal');

    postButton.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    const closeBtn = modal.querySelector(".close");
    closeBtn.addEventListener("click", function () {
      modal.style.display = "none";
    });