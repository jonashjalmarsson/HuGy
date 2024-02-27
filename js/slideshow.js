class SlideShow {
    constructor() {
        this.slideshow = document.querySelector(".slideshow");
        this.slides = this.slideshow.querySelectorAll(".slide-item");
        this.leftArrow = this.slideshow.querySelector(".left-arrow");
        this.rightArrow = this.slideshow.querySelector(".right-arrow");
        this.progressBar = this.slideshow.querySelector(".progress-bar");
        this.progress = this.slideshow.querySelector(".progress");
        if (this.slides.length > 1) {
            this.init();
            this.run();
        }
    }
    init() {
        this.progress.style.width = 100 / this.slides.length + "%";
        this.slideIndex = 0;
        this.timer = null;
        this.speed = 7000;
        this.leftArrow.addEventListener("click", e => this.left(e));
        this.rightArrow.addEventListener("click", e => this.right(e));
        this.slideshow.addEventListener("scroll", e => {
            this.slideIndex = Math.round(this.slideshow.scrollLeft / this.slideshow.clientWidth);
            this.showProgress();
            this.reset();
        })
    }
    do() {
        this.reset();
        this.slideshow.scroll({
            left: this.slideshow.clientWidth * this.slideIndex,
            behavior: "smooth"
        })
        this.showProgress()
    }
    reset() {
        clearInterval(this.timer);
        this.run();
    }
    run() {
        this.timer = setInterval(() => {
            this.right();
        }, this.speed);
    }
    left(e) {
        e?.preventDefault();
        if (this.slideIndex > 0) {
            this.slideIndex--;
        } else {
            this.slideIndex = this.slides.length - 1;
        }
        this.do();
    }
    right(e) {
        e?.preventDefault();
        if (this.slideIndex < this.slides.length - 1) {
            this.slideIndex++;
        } else {
            this.slideIndex = 0;
        }
        this.do();
    }
    showProgress() {
        // this.progressBar.style.left = this.slideIndex * 100 / this.slides.length + "%";
        this.progress.style.width = (this.slideIndex + 1) * 100 / this.slides.length + "%";
    }



}

