const modal = document.querySelector('.modal')
const modalImage = document.querySelector('.modal-image')
const modalDesc = document.querySelector('#modal-desc')
const modalDate = document.querySelector('.modal-date')

const createrName = document.querySelector('.createrName')
let isMyaccount = false
let hiddenDateUpdate
let hiddenDateRemove
if (!(createrName.innerText.indexOf('マイページ') == -1)) {
   isMyaccount = true
   hiddenDateUpdate = document.querySelector('#hidden-date-update')
   hiddenDateRemove = document.querySelector('#hidden-date-remove')
}

const modalOpen = (e) => {
   const src = e.target.attributes['src'].value
   const desc = e.target.attributes['desc'].value
   const date = new Date(e.target.attributes['date'].value * 1000)
   const upDate = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`
   const upTime = `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`
   modal.style.display = 'block'
   modalImage.style.backgroundImage = `url("../${src}")`
   modalDesc.innerText = desc
   modalDate.innerText = `Date: ${upDate} ${upTime}`
   if (isMyaccount) {
      hiddenDateUpdate.value = e.target.attributes['date'].value
      hiddenDateRemove.value = e.target.attributes['date'].value
   }
}

const postCards = document.getElementsByClassName('postCard')

for (let i = 0; i < postCards.length; i++) {
   postCards[i].addEventListener('click', modalOpen)
}

const outsideClose = (e) => {
   if (e.target == modal) {
      modal.style.display = 'none'
   }
}
addEventListener('click', outsideClose)

const escKeydown = (e) => {
   if (e.code == 'Escape') {
      modal.style.display = 'none'
   }
}
document.addEventListener('keydown', escKeydown)
