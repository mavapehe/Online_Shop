// main.js
class SearchBar extends HTMLElement {
    constructor() {
      super();
      this.attachShadow({ mode: 'open' });
    }
  
    connectedCallback() {
      this.loadHTML();
    }
  
    async loadHTML() {
      const res = await fetch('search-header.php');
      const text = await res.text();
      this.shadowRoot.innerHTML = text;
    }
  }
  
  customElements.define('search-header', SearchBar);