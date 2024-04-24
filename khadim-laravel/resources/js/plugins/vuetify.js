import '@fortawesome/fontawesome-free/css/all.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import colors from 'vuetify/lib/util/colors'

import { createVuetify } from "vuetify";

// Créez une instance de Vuetify en utilisant createVuetify
const vuetify = createVuetify({
  icons: {
    iconfont: 'md' || 'fa' 
  },
  theme: {
    themes: {
        light: {
            background: colors.grey.lighten2, // Not automatically applied
          },
      dark: {
        background: colors.shades.white, // If not using lighten/darken, use base to return hex
      },
    },
  }
});

// Exportez l'instance de Vuetify
export default vuetify;
