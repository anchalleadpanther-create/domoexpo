import { handleMessage } from "../customer/helpers.js";

const imageInput = document.querySelector(".img-input");
const progressBar = document.querySelector(".img-upload-progress");
const images = [];

function addOverlay() {
    document.querySelector(".rendered-images").style.opacity = 0.5;
    document.querySelector(".rendered-images").style.pointerEvents = "none";
}

function removeOverlay() {
    document.querySelector(".rendered-images").style.opacity = 1;
    document.querySelector(".rendered-images").style.pointerEvents = "all";
}

document.querySelector(".img-thumb").addEventListener("click", () => {
    imageInput.click();
});

// create a function to read multiple file input and put the names of files in images array
function readImages(files) {
    Array.from(files).forEach((file) => {
        if (file.type.startsWith("image/")) {
            const imageUrl = URL.createObjectURL(file);
            images.push({
                url: imageUrl,
                status: 0,
                file: file,
                id:
                    Math.random().toString(36).substring(2, 10) +
                    Math.random().toString(36).substring(2, 10),
            });
        }
    });
    console.log(images);
    renderImages(images);
}

function renderImages(images) {
    const imgTemplate = images
        .map((image) => {
            if (image.status === 0) {
                return `
        <div class="col-auto mt-2">
          <img
            src="${image.url}" class="thumb-image" />
          <div class="d-flex justify-content-center mt-2">
            <button class="btn btn-sm btn-primary get-link-btn" data-image-id="${image.id}">Get Link</button>
          </div>
        </div>
      `;
            }
        })
        .join(" ");

    document
        .querySelector(".rendered-images")
        .insertAdjacentHTML("afterbegin", imgTemplate);

    addOverlay();
    images.map(async (images) => {
        if (images.status === 0) {
            document.querySelector(
                '.get-link-btn[data-image-id="' + images.id + '"]'
            ).innerHTML = `Processing... 
            <div class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>`;
            await uploadAndGetLink(images.id);
            document.querySelector(
                '.get-link-btn[data-image-id="' + images.id + '"]'
            ).innerHTML = "Uploaded";
        }
        images.status = 1;
    });
    removeOverlay();
    console.log("2");
}

function handleProgressBar(percentCompleted) {
    progressBar.style.width = percentCompleted + "%";
    progressBar.ariaValueNow = percentCompleted;
    progressBar.textContent = percentCompleted + "%";

    if (percentCompleted === 100) {
        progressBar.parentElement.classList.add("d-none");
    }
}

async function uploadAndGetLink(id) {
    try {
        const photo = images.find((image) => image.id === id);
        const response = await axios.post(
            route("admin.bulk-upload-image.store"),
            {
                photo: photo.file,
            },
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                onUploadProgress: (progressEvent) => {
                    progressBar.parentElement.classList.remove("d-none");
                    const percentCompleted = Math.round(
                        (progressEvent.loaded * 100) / progressEvent.total
                    );
                    handleProgressBar(percentCompleted);
                },
            }
        );
        renderUploadedPhoto(
            response.data.data.file,
            photo.url,
            response.data.data.id
        );
    } catch (error) {
        if (error.hasOwnProperty("response")) {
            return handleMessage(
                "error",
                "Uh Oh!",
                error.response.data.message
            );
        }
        if (typeof error === "string") {
            return handleMessage("error", "Uh Oh!", error);
        }
    }
}

function renderUploadedPhoto(file, url, id) {
    document.querySelector(".photos-list").insertAdjacentHTML(
        "afterbegin",
        `
    <tr>
      <td>
        <img src="${url}"
          class="thumb-image-2 px-1 mt-2" />
      </td>
      <td>
        <a href="${file}"
          target="_blank">${file}</a>
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary btn-sm copy-link w-100" 
          data-link="${file}">Copy Link</button>
        <button  data-bs-toggle="modal" data-bs-target="#modal-delete" title="Delete photo"
          onclick="destroyUrlUpdate(this)"
          data-destroy-url="${route(
              "admin.bulk-upload-image.destroy",
              id
          )}" type="button" class="btn btn-primary btn-sm w-100">Delete</button>
          </div>
      </td>
    </tr>
  `
    );
}

// document
//     .querySelector(".rendered-images")
//     .addEventListener("click", async (event) => {
//         if (event.target.classList.contains("get-link-btn")) {
//             const btn = event.target;
//             const id = btn.dataset.imageId;
//             await uploadAndGetLink(id);
//             btn.classList.remove("get-link-btn");
//             btn.textContent = "Link generated!";
//         }
//     });

imageInput.addEventListener("change", (event) => {
    readImages(event.target.files);
});

document.querySelector(".photos-list").addEventListener("click", (event) => {
    if (event.target.classList.contains("copy-link")) {
        const btn = event.target;
        const link = btn.dataset.link;
        navigator.clipboard.writeText(link);
        btn.textContent = "Copied!";
        setTimeout(() => {
            btn.textContent = "Copy Link";
        }, 3000);
    }
});
