// --- styles (once) ---
(function ensureStyles(){
  if (document.getElementById('confirm-modal-style')) return;
  const style = document.createElement('style');
  style.id = 'confirm-modal-style';
  style.textContent = `
    .cm-overlay{position:fixed;inset:0;background:rgba(0,0,0,.35);display:none;align-items:center;justify-content:center;z-index:9999}
    .cm-dialog{background:#fff;border:1px solid #FFCC00;border-radius:12px;min-width:300px;max-width:90vw;padding:16px;box-shadow:0 10px 30px rgba(0,0,0,.15)}
    .cm-actions{display:flex;gap:8px;justify-content:flex-end;margin-top:12px}
    .cm-btn{padding:8px 12px;border-radius:8px;border:1px solid #ddd;background:#f7f7f7;cursor:pointer}
    .cm-btn.primary{border-color:#FFCC00;background:#fff}
    .field-hint{margin:6px 0 0 2px;font-size:.9rem;color:#b00020;}
    .cm-error{margin-top:8px;color:#b00020;font-size:.9rem;min-height:1.2em}
  `;
  document.head.appendChild(style);
})();

// build modal once
function createConfirmModal() {
  const overlay = document.createElement('div');
  overlay.className = 'cm-overlay';
  overlay.innerHTML = `
    <div class="cm-dialog" role="dialog" aria-modal="true" aria-labelledby="cm-title">
      <h3 id="cm-title" style="margin:0 0 8px;">Confirm request</h3>
      <p class="cm-msg" style="margin:0 0 8px;"></p>
      <div class="cm-actions">
        <button type="button" class="cm-btn cm-no">No</button>
        <button type="button" class="cm-btn primary cm-yes">Yes</button>
      </div>
      <div class="cm-error" aria-live="polite"></div>
    </div>`;
  document.body.appendChild(overlay);
  return overlay;
}

(function attachBookingConfirm(){
  const form   = document.getElementById('booking-form');
  const select = document.getElementById('availability-select');
  if (!form || !select) return;

  // inline hint under the select (no alert)
  const hint = document.createElement('p');
  hint.className = 'field-hint';
  hint.textContent = 'Please select a time slot.';
  hint.style.display = 'none';
  select.insertAdjacentElement('afterend', hint);
  select.addEventListener('change', () => { if (select.selectedIndex > 0) hint.style.display = 'none'; });

  const overlay = createConfirmModal();
  const msg     = overlay.querySelector('.cm-msg');
  const btnYes  = overlay.querySelector('.cm-yes');
  const btnNo   = overlay.querySelector('.cm-no');
  const errLine = overlay.querySelector('.cm-error');

  const { price, userCredits, isLoggedIn } = window.BOOKING_CONTEXT || { price:0, userCredits:0, isLoggedIn:false };

  function openConfirm(text){
    msg.textContent = text;
    errLine.textContent = '';              // reset error line
    overlay.style.display = 'flex';
    btnYes.focus();
  }
  function closeConfirm(){ overlay.style.display = 'none'; }
  overlay.addEventListener('click', (e)=>{ if (e.target === overlay) closeConfirm(); });
  btnNo.addEventListener('click', closeConfirm);
  document.addEventListener('keydown',(e)=>{ if (overlay.style.display==='flex' && e.key==='Escape') closeConfirm(); });

  form.addEventListener('submit', (e) => {
    // must choose a slot
    if (!select.value || select.selectedIndex === 0) {
      e.preventDefault();
      hint.style.display = 'block';
      select.focus();
      return;
    }
    // must be logged in
    if (!isLoggedIn) {
      e.preventDefault();
      openConfirm('Please log in to request this service.');
      return;
    }

    // show modal; let Yes do the checks + submit
    e.preventDefault();
    openConfirm(`This request will cost ${price} FUSS credits. Proceed?`);

    const onYes = async () => {
      // 1) client-side credit check
      if (Number.isFinite(price) && Number.isFinite(userCredits) && userCredits < price) {
        errLine.textContent = `Insufficient credits: you have ${userCredits}, need ${price}.`;
        return; // keep modal open
      }

      // 2) submit to server (authoritative re-check & deduction)
      errLine.textContent = 'Submitting…';
      try {
        const res = await fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: { 'X-Requested-With': 'fetch' }
        });

        // If server redirects (success), follow it
        if (res.redirected) {
          window.location.assign(res.url);
          return;
        }

        // Otherwise read text (server may return an error string)
        const text = await res.text();
        if (!res.ok) {
          errLine.textContent = text || 'Request failed on the server.';
          return;
        }

        // If server returns JSON {ok:true, redirect:"..."} (optional pattern)
        try {
          const json = JSON.parse(text);
          if (json && json.ok && json.redirect) {
            window.location.assign(json.redirect);
            return;
          }
        } catch (_) {}

        // Fallback success message
        errLine.textContent = 'Request submitted.';
        closeConfirm();
      } catch (err) {
        errLine.textContent = String(err.message || 'Network error');
      }
    };

    // ensure one-time binding per open
    btnYes.onclick = onYes;
  });
})();

