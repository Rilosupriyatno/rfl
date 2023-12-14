'use strict';

// visible class
const modalVisibleClass = 'bg-black/80 w-full h-screen fixed bottom-0 left-0';
const modalOverlayVisibleClass = 'absolute w-full h-full z-10';
const modalContentVisibleClass =
  'absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-0 bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 py-4 z-50 transition-transform duration-300';
// invisible class
const modalInvisibleClass =
  'bg-transparent invisible w-full h-screen fixed bottom-0 left-0 transition-all';
const modalOverlayInvisibleClass = 'hidden w-full h-full z-10';
const modalContentInvisibleClass =
  'absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-[40rem] bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 pt-4 z-50 transition-transform duration-300';

export function openModal(modal, modalOverlay, modalContent) {
  // remove class
  modalInvisibleClass.split(' ').forEach((cls) => modal.classList.remove(cls));
  modalOverlayInvisibleClass
    .split(' ')
    .forEach((cls) => modalOverlay.classList.remove(cls));
  modalContentInvisibleClass
    .split(' ')
    .forEach((cls) => modalContent.classList.remove(cls));

  // add class
  modalVisibleClass.split(' ').forEach((cls) => modal.classList.add(cls));
  modalOverlayVisibleClass
    .split(' ')
    .forEach((cls) => modalOverlay.classList.add(cls));
  modalContentVisibleClass
    .split(' ')
    .forEach((cls) => modalContent.classList.add(cls));
}

export function closeModal(modal, modalOverlay, modalContent) {
  // remove class
  modalVisibleClass.split(' ').forEach((cls) => modal.classList.remove(cls));
  modalOverlayVisibleClass
    .split(' ')
    .forEach((cls) => modalOverlay.classList.remove(cls));
  modalContentVisibleClass
    .split(' ')
    .forEach((cls) => modalContent.classList.remove(cls));

  // add class
  modalInvisibleClass.split(' ').forEach((cls) => modal.classList.add(cls));
  modalOverlayInvisibleClass
    .split(' ')
    .forEach((cls) => modalOverlay.classList.add(cls));
  modalContentInvisibleClass
    .split(' ')
    .forEach((cls) => modalContent.classList.add(cls));
}

export function initModal(element, modal, modalOverlay, modalContent) {
  // elements modal
  const modalDismiss = document.querySelector('[modal-dismiss="modal-close"]');

  // do open modal
  element.addEventListener('click', function () {
    openModal(modal, modalOverlay, modalContent);
  });

  modalOverlay.addEventListener('click', function () {
    closeModal(modal, modalOverlay, modalContent);
  });

  modalDismiss.addEventListener('click', function () {
    closeModal(modal, modalOverlay, modalContent);
  });
}
