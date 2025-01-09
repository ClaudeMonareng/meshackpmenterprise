
    // TOGGLE NAVBAR

    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
        menuBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    });

    // STICKY NAVBAR
    // NAVIGATION BAR EFFECTS ON SCROLL

    window.addEventListener("scroll", function () {
        const header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    // PORTFOLIO SECTION - MODAL

    const portfolioModals = document.querySelectorAll(".portfolio-modal");
    const imgCards = document.querySelectorAll(".img-card");
    const portfolioCloseBtns= document.querySelectorAll(".portfolio-close-btn");

    var portfolioModal = function(modalClick){
        portfolioModals[modalClick].classList.add("active");
    };
    
    imgCards.forEach((imgCard, i) => {
        imgCard.addEventListener("click", () => {
            portfolioModal(i);
        });
    });

    portfolioCloseBtns.forEach((portfolioCloseBtn) => {
        portfolioCloseBtn.addEventListener("click", () => {
        portfolioModals.forEach((portfolioModalView) => {
                portfolioModalView.classList.remove("active");
            });
        });
    });

    // TYPEWRITER EFFECT

    const words= ['Boldness', 'Clarity', 'Originality', 'Precision'];

    let mainTimeline = gsap.timeline({
        repeat: -1
    });

    // For each word, Create a new timeline, use the text plugin, then append that timeline to the main one

    words.forEach(word => {
        let textTimeline = gsap.timeline({
            repeat: 1,
            yoyo: true,
            repeatDelay: 3
        });

        textTimeline.to('#typewriter', {
            text: word,
            duration: 1,
            onUpdate: () => {
                cursorTimeline.restart();
                cursorTimeline.pause();
            },
            onComplete: () => {
                cursorTimeline.play();
            }
        });
        mainTimeline.add(textTimeline);
    });

    // BLINKING CURSOR

    let cursorTimeline = gsap.timeline({
        repeat: -1,
        repeatDelay: .8
    });

    cursorTimeline.to('#cursor', {
        opacity: 1,
        duration: 0
    }).to('#cursor', {
        opacity: 0,
        duration: 0,
        delay: .8
    });