export default {
    delimiters: ['[[',']]'],
    props: ['tableclass', 'sistemas', 'classtableheader'],
    template: `
      <table class="table table-sm" :class="tableclass">
        <thead :class="classtableheader">
          <tr>
            <th scope="col">Sistema</th>
            <th scope="col">Atividades</th>
            <th scope="col">Pontos</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="sistema in sistemas" :key="sistema.sistema" v-if="sistemas">
            <th>[[sistema.sistema]]</th>
            <td>[[sistema.atividades]]</td>
            <td>[[sistema.pesos]]</td>
          </tr>
          <tr v-else>
            <td colspan="3" class="text-center">Não há dados</td>
          </tr>
        </tbody>
      </table>
    `,
}