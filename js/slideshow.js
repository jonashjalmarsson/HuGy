class SlideShow {
    constructor() {
        this.slideshow = document.querySelector(".slideshow")
        this.slides = this.slideshow.querySelectorAll(".slide-item")
        this.leftArrow = this.slideshow.querySelector(".left-arrow")
        this.rightArrow = this.slideshow.querySelector(".right-arrow")
        this.progressBar = this.slideshow.querySelector(".progress-bar")
        this.progress = this.slideshow.querySelector(".progress")
        console.log(this.slides.length)
        if (this.slides.length > 1) {
            this.init()
            this.run()
        }
    }
    init() {
        this.progress.style.width = 100 / this.slides.length + "%"
        this.slideIndex = 0
        this.prevSlide = 0
        this.timer = null
        this.speed = 7000
        this.leftArrow.addEventListener("click", e => this.clickLeft(e))
        this.rightArrow.addEventListener("click", e => this.clickRight(e))
        this.createClones()
        // this.slideshow.addEventListener("scroll", e => {
        //     this.slideIndex = Math.round(this.slideshow.scrollLeft / this.slideshow.clientWidth)
        //     this.showProgress()
        //     this.reset()
        // })
        // this.do()
    }
    createClones() {
        // prepend last slide to the beginning
        let lastSlide = this.slides[this.slides.length - 1].cloneNode(true)
        let firstSlide = this.slides[0].cloneNode(true)
        let secondSlide = this.slides[1].cloneNode(true)
        lastSlide.classList.add("clone")
        firstSlide.classList.add("clone")
        secondSlide.classList.add("clone")
        this.slideshow.prepend(lastSlide)
        this.slideshow.append(firstSlide)
        // this.slideshow.append(secondSlide)
        // reset the slides
        this.slides = this.slideshow.querySelectorAll(".slide-item")
    }        
    length() {
        return this.slides.length - 3
    }
    do() {
        console.log(this.slideIndex)
        let nextScroll = this.slides[this.slideIndex + 1].offsetLeft
        this.slideshow.scroll({
            left: nextScroll,
            behavior: "smooth"
        })

        this.showProgress()
    }
    reset() {
        clearInterval(this.timer)
        this.run()
    }
    run() {
        this.timer = setInterval(() => {
            this.right()
        }, this.speed)
    }
    clickLeft(e) {
        e.preventDefault()
        this.reset()
        this.left()
    }
    clickRight(e) {
        e.preventDefault()
        this.reset()
        this.right()
    }
    left() {
        this.prevSlide = this.slideIndex
        if (this.slideIndex > 0) {
            this.slideIndex--
        } else {
            let nextScroll = this.slides[this.length()+2].offsetLeft
            this.slideshow.scroll({
                left: nextScroll,
                behavior: "instant"
            })
            this.slideIndex = this.length()
        }
        this.do()
    }
    right() {
        this.prevSlide = this.slideIndex
        if (this.slideIndex < this.length()) {
            this.slideIndex++
        } else {
            let nextScroll = this.slides[0].offsetLeft
            this.slideshow.scroll({
                left: nextScroll,
                behavior: "instant"
            })
      
            this.slideIndex = 0
        }
        this.do()
    }
    showProgress() {
        // this.progressBar.style.left = this.slideIndex * 100 / this.length() + "%"
        this.progress.style.width = (this.slideIndex + 1) * 100 / (this.length() + 1) + "%"
    }



}

