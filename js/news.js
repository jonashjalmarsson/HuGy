class NewsLoader {
  constructor() {
    this.paged = 2;
    this.load_more_button = document.querySelector(".load-more-news");
    this.news_wrapper = document.querySelector(".news-wrapper");
    this.loading = false;
    if (!this.load_more_button) return;

    this.news_per_page = this.load_more_button.dataset.news_per_page;
    this.load_more_button.addEventListener("click", e => {
      e.preventDefault();
      this.load();
    });
    // add onscroll event to load more news when user reaches bottom of news-wrapper
    window.onscroll = () => {
        // skip if url contains #menu
        if (window.location.href.indexOf("#menu") > -1) return;
        if (window.innerHeight + window.scrollY >= this.news_wrapper.offsetHeight) {
            this.load();
        }
    };
  }

  load() {
    if (this.loading) return;
    this.loading = true;
    this.load_more_button.innerHTML = "Laddar...";
    fetch(hugy_obj.ajaxurl, {
        method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: new URLSearchParams({
        action: "hugy_load_more_news",
        news_per_page: this.news_per_page,
        paged: this.paged,
      })
    })
      .then(response => response.text())
      .then(data => {
        document.querySelector(".news-wrapper").insertAdjacentHTML("beforeend", data);
        this.paged++;
        this.load_more_button.innerHTML = "Visa fler nyheter";
        this.removeDuplicates();
      })
      .catch(error => console.error("Error:", error))
      .finally(() => this.loading = false);
    }

    removeDuplicates() {
        let news = document.querySelectorAll(".news");
        // get ids
        let ids = [];
        news.forEach(n => {
            ids.push(n.dataset.id);
        });
        // remove duplicates from dom
        news.forEach(n => {
            if (ids.indexOf(n.dataset.id) !== ids.lastIndexOf(n.dataset.id)) {
                n.remove();
            }
        });
    }

}

    