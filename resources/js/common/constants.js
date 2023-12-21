export const isIE = /Trident/.test( navigator.userAgent )
export const isEdge = /Edge/.test( navigator.userAgent )

function _dateTimeFormatShort() {
  switch (document.documentElement.lang) {
    case 'fi': return 'DD.MM.YY HH:mm';
  }
}
function _dateTimeFormat() {
  switch (document.documentElement.lang) {
    case 'fi': return 'DD.MM.YYYY HH:mm';
  }
}
function _dateFormat() {
  switch (document.documentElement.lang) {
    case 'fi': return 'DD.MM.YYYY';
  }
}
function _timeFormat() {
  switch (document.documentElement.lang) {
    case 'fi': return 'HH:mm';
  }
}

export const isMobile = () => {
  if($(window).width() < 768) {
    return true;
  } else {
    return false;
  }
}

export const dateTimeFormatShort = _dateTimeFormatShort();
export const dateTimeFormat = _dateTimeFormat();
export const dateFormat = _dateFormat();
export const timeFormat = _timeFormat();

export const ToastTypes = {
  SUCCESS: 1,
  ERROR: 2
}