"use strict";

const { shipmentModal } = require("../../../component/shipment-modal");
const { initModal, closeModal } = require("../../helper/popup");

window.addEventListener("load", function () {
  // list of elements
  const mainContainer = document.querySelector(".main-container");
  const courierEl = document.querySelectorAll(".courier");

  // get cart overview element
  const totalPriceEl = document.querySelector(".total-price").firstElementChild;
  const totalShipmentEl = document.querySelector(".total-shipment");
  const subTotalEl = document.querySelector(".sub-total");
  const payButton = document.getElementById("pay-button");
  const parentButton = payButton.closest("div");

  // class list for pay button and parent itself
  const removeCursorNotAllowed = ["cursor-not-allowed"];
  const addCursorPointer = ["cursor-pointer"];
  const removeDisableBtn = ["bg-gray-200", "pointer-events-none"];
  const addBackgroundBtn = ["bg-[#FFCC33]"];

  let lastCartShippingsData = [];
  let cartShippingsData = [];
  let shipmentCounter = 0;
  let lastShipmentFeeOrder = [];
  let totalShipmentFee = 0;

  function filteringShipment(filterDatas, indexDatas) {
    indexDatas = indexDatas.map((indexData) => JSON.stringify(indexData));

    const filteredData = filterDatas
      .map((filterData) => {
        const compareData = indexDatas.indexOf(JSON.stringify(filterData));

        if (compareData === -1) return filterData;
      })
      .filter((filterData) => filterData !== undefined);

    return filteredData;
  }

  async function checkCost(courierEl, originEl, destinationEl, weightEl) {
    // form data
    let formData = new FormData();

    // credentials
    const _url = `/rajaongkir/cost`;
    const _token = document
      .getElementsByTagName("meta")[3]
      .getAttribute("content");

    // append the form
    formData.append("origin", originEl.value);
    formData.append("destination", destinationEl.value);
    formData.append("weight", weightEl.value);
    formData.append("courier", courierEl.value);

    // get the cost from rajaongkir
    try {
      const response = await fetch(_url, {
        method: "POST",
        mode: "cors",
        dataType: "JSON",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
          "X-CSRF-TOKEN": _token,
        },
        body: formData,
      });

      // parse JSON response into native js object
      if (!response.ok) {
        const textErr = await response.text();
        const textErrParse = JSON.parse(textErr);
        const [keyErr, msgErr] = Object.entries(textErrParse)[0];
        const error_message = textErrParse[keyErr];
        const error_detail = {
          status: response.status,
          message: error_message,
        };

        throw new Error(JSON.stringify(error_detail));
      }

      return await response.json();
    } catch (error) {
      throw error;
    }
  }

  // shipment selection
  courierEl.forEach(function (courier, index) {
    courier.addEventListener("change", async function (el) {
      // current element
      const currEl = el.target;
      // get sibling parent of courier element
      const shipmentContainerEl = currEl.closest(
        "div.courier-selection"
      ).nextElementSibling;
      // all element siblings
      const orderDetailIdEl = currEl
        .closest("div")
        .querySelector("#order_detail_list");
      const buyerAddressEl = currEl
        .closest("div")
        .querySelector("#buyer_address");
      const shipmentContainer = currEl.closest("div").nextElementSibling;
      const originEl = currEl.closest("div").querySelector("#city_seller");
      const destinationEl = currEl.closest("div").querySelector("#city_buyer");
      const weightEl = currEl.closest("div").querySelector("#total_weight");

      // remove and add class for container can be clickable
      const removeClass = ["cursor-pointer"];
      const addClass = ["pointer-events-none", "bg-gray-200"];

      // variable support
      let tempAmount = 0;

      shipmentContainer.classList.remove(...removeClass);
      shipmentContainer.classList.add(...addClass);

      // default behavior for shipmentContainerEl after courier do selection
      const selectShipmentText = `<span class="font-bold text-[1.2rem]">Pilih Pengiriman</span>`;

      // doing only when the element is already changed
      if (shipmentContainerEl.firstElementChild.nodeName !== "SPAN") {
        // remove the first child element
        shipmentContainerEl.removeChild(shipmentContainerEl.firstElementChild);
        // insert to first child element with new element
        shipmentContainerEl.insertAdjacentHTML(
          "afterbegin",
          selectShipmentText
        );

        // reduce when the element is changed
        shipmentCounter -= 1;

        // filtering shipment by cart shippings data but per indexing element value
        cartShippingsData = filteringShipment(
          cartShippingsData,
          lastCartShippingsData[index]
        );

        // totaling all lastShipmentFeeOrder values
        totalShipmentFee =
          lastShipmentFeeOrder.length > 0
            ? lastShipmentFeeOrder.reduce((acc, fee) => acc + fee, 0)
            : 0;

        // change the format into rupiah
        const totalShipmentFeeRupiah = `${
          totalShipmentFee > 0
            ? `Rp. ${totalShipmentFee
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`
            : `-`
        }`;

        // replace the text content last element child of total shipment
        totalShipmentEl.lastElementChild.textContent = totalShipmentFeeRupiah;

        // change the class of the parent element of button
        parentButton.classList.add(...removeCursorNotAllowed);
        parentButton.classList.remove(...addCursorPointer);

        // change the class of the button itself
        payButton.classList.add(...removeDisableBtn);
        payButton.classList.remove(...addBackgroundBtn);
      }

      try {
        // disabled select element
        currEl.disabled = true;

        const shipmentTitle = `shipment-${index + 1}`;
        const [getCost] = await checkCost(
          currEl,
          originEl,
          destinationEl,
          weightEl
        );

        // enable the select shipment element
        const removeClass = ["pointer-events-none", "bg-gray-200"];
        const addClass = ["cursor-pointer"];

        shipmentContainer.classList.remove(...removeClass);
        shipmentContainer.classList.add(...addClass);

        // modal shipment start
        const shipmentModalData = shipmentModal({
          container: mainContainer,
          title: shipmentTitle,
          costData: getCost,
          cartDetail: {
            cartId: orderDetailIdEl.value,
            cartWeight: weightEl.value,
          },
          buyerDetail: {
            buyerAddress: buyerAddressEl.value,
          },
        });

        // init modal
        const modalEL = document.getElementById(`modal-${shipmentTitle}`);
        const modalOverlay = document.getElementById(
          `modal-overlay-${shipmentTitle}`
        );
        const modalContent = document.getElementById(
          `modal-content-${shipmentTitle}`
        );

        initModal(shipmentContainer, modalEL, modalOverlay, modalContent);

        // start to selecting shipment
        const modalBodyEl = document.querySelector(
          `.modal-body-shipment-${index + 1}`
        );
        const shipmentListParentEl = modalBodyEl.children;

        for (const element of shipmentListParentEl) {
          element.addEventListener("click", (e) => {
            // only get the LI element wherever the click is place on
            const clickedLIEl = e.target.closest("li");
            const rowNumberLI =
              Array.from(element.children).indexOf(clickedLIEl) + 1;
            // is not selected row
            const newArrChildren = Array.from(element.children);
            // splice it
            newArrChildren.splice(rowNumberLI - 1, 1);

            // create a deep copy of shipmentModalData
            const deepCopyOfShipmentModalData = JSON.parse(
              JSON.stringify(shipmentModalData)
            );

            let isChangeShipment = false;

            // always reduce the total shipment fee with temp amount
            // totalShipmentFee -= tempAmount;

            // doing some filtering method
            const filteringSelectedData = deepCopyOfShipmentModalData.map(
              (data) => {
                // shipping estimate filter
                data.shipping_estimate = data.shipping_estimate.filter(
                  (shipping_estimate) => shipping_estimate.row === rowNumberLI
                );

                // shipping fee filter
                data.shipping_fee = data.shipping_fee.filter(
                  (shipping_fee) => shipping_fee.row === rowNumberLI
                );

                // shipping services filter
                data.shipping_services = data.shipping_services.filter(
                  (shipping_service) => shipping_service.row === rowNumberLI
                );

                // return data
                return data;
              }
            );

            // change the shipment container content to be selected shipment detail
            // declare all data
            const { shipping_estimate, shipping_fee, shipping_services } =
              filteringSelectedData[0];
            const { estimate_day } = shipping_estimate[0];
            const { amount } = shipping_fee[0];
            const { service } = shipping_services[0];

            let lastFilteredData = [];

            // insert the checklist element for giving the mark the element is selected
            const markEl = `
              <img src="../../assets/icons/check.png" alt="checklist" class="checklist-green w-[2.5rem] h-[2.5rem]">
            `;

            // validate just only one selected element
            if (clickedLIEl.lastElementChild.nodeName === "A") {
              clickedLIEl.insertAdjacentHTML("beforeend", markEl);

              // insert to tempAmount
              tempAmount = amount;

              // increase the value of shipment counter
              shipmentCounter += 1;
            }

            // remove the mark if the element is not selected
            newArrChildren.forEach((child, index) => {
              if (child.lastElementChild.nodeName === "IMG") {
                child.removeChild(child.lastElementChild);
                const rowNumberLI =
                  Array.from(element.children).indexOf(child) + 1;

                shipmentCounter -= 1;

                isChangeShipment = true;

                const deepCopyOfShipmentModalData = JSON.parse(
                  JSON.stringify(shipmentModalData)
                );

                const lastData = deepCopyOfShipmentModalData.map((data) => {
                  // shipping estimate filter
                  data.shipping_estimate = data.shipping_estimate.filter(
                    (shipping_estimate) => shipping_estimate.row === rowNumberLI
                  );

                  // shipping fee filter
                  data.shipping_fee = data.shipping_fee.filter(
                    (shipping_fee) => shipping_fee.row === rowNumberLI
                  );

                  // shipping services filter
                  data.shipping_services = data.shipping_services.filter(
                    (shipping_service) => shipping_service.row === rowNumberLI
                  );

                  // return data
                  return data;
                });

                lastFilteredData = lastData;
              }
            });

            // change the format from array to string
            const estimateDayString = estimate_day
              .map((day) => day.split(" ").slice(0, 2).join(" "))
              .join(" - ");

            // change the format into rupiah
            const valueRupiahFormat = `Rp. ${amount
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;

            // selected shipment content element
            const selectedShipmentEl = `
              <div class="flex flex-col gap-1">
                  <span class="text-[1.2rem] font-bold">${service} (${valueRupiahFormat})</span>
                  <p class="text-[#767676]">Estimasi tiba ${estimateDayString}</p>
              </div>
            `;

            // remove the first child element
            shipmentContainerEl.removeChild(
              shipmentContainerEl.firstElementChild
            );

            // insert to first child element with new element
            shipmentContainerEl.insertAdjacentHTML(
              "afterbegin",
              selectedShipmentEl
            );

            // modal close
            closeModal(modalEL, modalOverlay, modalContent);

            // always removing before insert
            lastShipmentFeeOrder.splice(index, 1);
            lastCartShippingsData.splice(index, 1);

            // inserting by index
            lastShipmentFeeOrder.splice(index, 0, tempAmount);
            lastCartShippingsData.splice(index, 0, filteringSelectedData);

            // push the data to cart shippings data
            cartShippingsData.push(...filteringSelectedData);

            // only filter when last filtered data is more than one
            if (lastFilteredData.length !== 0) {
              // filtering the shipment
              cartShippingsData = filteringShipment(
                cartShippingsData,
                lastFilteredData
              );
            }

            // totaling all lastShipmentFeeOrder values
            totalShipmentFee =
              lastShipmentFeeOrder.length > 0
                ? lastShipmentFeeOrder.reduce((acc, fee) => acc + fee, 0)
                : 0;

            // get grand total
            const cartGrandTotal =
              parseInt(totalPriceEl.value) + parseInt(totalShipmentFee);

            // change the format into rupiah
            const totalShipmentFeeRupiah = `Rp. ${totalShipmentFee
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
            const cartGrandTotalRupiah = `Rp. ${cartGrandTotal
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;

            // replace the text content last element child of total shipment
            totalShipmentEl.lastElementChild.textContent =
              totalShipmentFeeRupiah;

            // replace the text content of 'total tagihan'
            subTotalEl.lastElementChild.textContent = cartGrandTotalRupiah;

            // element of button and parent of button
            const canPay = courierEl.length === shipmentCounter;

            // if can pay is true
            if (canPay) {
              // change the class of the parent element of button
              parentButton.classList.remove(...removeCursorNotAllowed);
              parentButton.classList.add(...addCursorPointer);

              // change the class of the button itself
              payButton.classList.remove(...removeDisableBtn);
              payButton.classList.add(...addBackgroundBtn);
            }
          });
        }
      } catch (error) {
        console.error(error);
      } finally {
        // enable select element
        currEl.disabled = false;
      }
    });
  });

  payButton.addEventListener("click", async function (e) {
    // form data
    let formData = new FormData();

    // element itself and element target
    const currEl = e.target;
    const dataOrder = currEl.dataset.order;
    const cartGrandTotal =
      parseInt(totalPriceEl.value) + parseInt(totalShipmentFee);

    // credentials
    // const _url = `/administration/cart/create_snaptoken`;
    // const _token = document
    //   .getElementsByTagName("meta")[3]
    //   .getAttribute("content");

    // ordering by order detail id for cart shippings data
    const cartShippingsDataAsc = cartShippingsData.sort(
      (a, b) => a.order_detail_id - b.order_detail_id
    );

    // append the form
    formData.append("data_order", dataOrder);
    formData.append("grand_total", cartGrandTotal);
    formData.append("shipping_fees", lastShipmentFeeOrder);
    formData.append("shipping_data", JSON.stringify(cartShippingsDataAsc));

    // disabled the button while doing process
    // change the class of the parent element of button
    parentButton.classList.add(...removeCursorNotAllowed);
    parentButton.classList.remove(...addCursorPointer);

    // change the class of the button itself
    payButton.classList.add(...removeDisableBtn);
    payButton.classList.remove(...addBackgroundBtn);

    window.location.href = "/transaction/transaction-list";
    // try {
    //   // touch API
    //   const response = await fetch(_url, {
    //     method: "POST",
    //     mode: "cors",
    //     dataType: "JSON",
    //     cache: "no-cache",
    //     credentials: "same-origin",
    //     headers: {
    //       "X-CSRF-TOKEN": _token,
    //     },
    //     body: formData,
    //   });

    //   // parse JSON response into native js object
    //   if (!response.ok) {
    //     const textErr = await response.text();
    //     const textErrParse = JSON.parse(textErr);
    //     const [keyErr, msgErr] = Object.entries(textErrParse)[0];
    //     const error_message = textErrParse[keyErr];
    //     const error_detail = {
    //       status: response.status,
    //       message: error_message,
    //     };
    //     throw new Error(JSON.stringify(error_detail));
    //   }

    //   const { snap_token, order_id } = await response.json();

    //   // there token is exist
    //   if (snap_token) {
    //     // call snap pay midtrans
    //     snap.pay(snap_token, {
    //       onSuccess: async function (result) {
    //         const { payment_type, status_code, va_numbers } = result;
    //         const { bank } = va_numbers[0];

    //         // update the order when payment was succeed
    //         const urlUpdateSuccess = `/administration/cart/success-payment/${order_id}`;

    //         if (parseInt(status_code) === 200) {
    //           // form update
    //           let formUpdate = new FormData();

    //           // append it
    //           formUpdate.append("payment_type", `${bank}_${payment_type}`);
    //           // set _method url in form data
    //           formUpdate.append("_method", "PUT");

    //           // update the order
    //           const responseUpdate = await fetch(urlUpdateSuccess, {
    //             method: "POST",
    //             mode: "cors",
    //             dataType: "JSON",
    //             cache: "no-cache",
    //             credentials: "same-origin",
    //             headers: {
    //               "X-CSRF-TOKEN": _token,
    //             },
    //             body: formUpdate,
    //           });

    //           // using it later
    //           const { success_payment } = await responseUpdate.json();

    //           // redirect to transaction list
    //           window.location.href = "/transaction/transaction-list";
    //         }
    //       },
    //     });
    //   } else {
    //     throw new Error(
    //       "failed to genereate the token, please call the developer or try again!"
    //     );
    //   }
    // } catch (error) {
    //   console.error(error);
    // } finally {
    //   // make the button enable again
    //   // change the class of the parent element of button
    //   parentButton.classList.remove(...removeCursorNotAllowed);
    //   parentButton.classList.add(...addCursorPointer);

    //   // change the class of the button itself
    //   payButton.classList.remove(...removeDisableBtn);
    //   payButton.classList.add(...addBackgroundBtn);
    // }
  });
});
