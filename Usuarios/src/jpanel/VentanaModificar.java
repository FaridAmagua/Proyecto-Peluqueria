package jpanel;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.EventQueue;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;

import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JTextField;
import javax.swing.JLabel;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

public class VentanaModificar extends JFrame {

	private JPanel contentPane;
	private JTextField txtUsuario;
	private JTextField txtFechaCita;
	private JTextField txtNuevaFecha;
	private JLabel lblNewLabel;
	private JButton btnNewButton;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VentanaModificar frame = new VentanaModificar();


					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}


	/**
	 * Create the frame.
	 */
	public VentanaModificar() {
		setBounds(100, 100, 872, 614);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		this.setLocationRelativeTo(null);

		btnNewButton = new JButton("Enviar");
		btnNewButton.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				try {
					Modificar();
				} catch (Exception e2) {
					// TODO: handle exception

				}
			}
		});
		btnNewButton.setBounds(730, 509, 89, 30);
		contentPane.add(btnNewButton);



		txtUsuario = new JTextField();
		txtUsuario.setBounds(268, 251, 264, 30);
		contentPane.add(txtUsuario);
		txtUsuario.setColumns(10);

		txtFechaCita = new JTextField();
		txtFechaCita.setBounds(268, 333, 264, 30);
		contentPane.add(txtFechaCita);
		txtFechaCita.setColumns(10);

		txtNuevaFecha = new JTextField();
		txtNuevaFecha.setBounds(268, 421, 264, 30);
		contentPane.add(txtNuevaFecha);
		txtNuevaFecha.setColumns(10);

		lblNewLabel = new JLabel("\r\n");
		lblNewLabel.setIcon(new ImageIcon("C:\\Users\\farid\\OneDrive\\Documentos\\Proyecto\\Imagenes\\modificar.png"));
		lblNewLabel.setBounds(0, 0, 878, 573);
		contentPane.add(lblNewLabel);
		this.setLocationRelativeTo(null);


	}

	public void Modificar() {

		Connection con = null;
		try {
			con = Conexiones.Conexion.getConnection();







		} catch (ClassNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println("ERROR CONEXION");
		}




		try {


			String query ="{call ModificarCita(?,?,?,?)}";
			CallableStatement cs = con.prepareCall(query);
			cs.setString(1, txtUsuario.getText());
			cs.setString(2, txtFechaCita.getText());
			cs.setString(3,txtNuevaFecha.getText());




			//Resto de sets


			cs.execute();


			int resultado = cs.getInt(4);



			cs.registerOutParameter(4, java.sql.Types.INTEGER);





			if (resultado == 0) {
				JOptionPane.showMessageDialog(null, "CITA MODIFICADA CORRECTAMENTE");
			}
			borrar();
			cs.close();




		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			borrar();
			JOptionPane.showMessageDialog(null, "USUARIO NO MODIFICADO COMPRUEBE BIEN LOS CAMPOS", "Algo anda mal", JOptionPane.WARNING_MESSAGE);

		}
	}


	private void borrar() {
		// TODO Auto-generated method stub
		txtUsuario.setText(null);
		txtFechaCita.setText(null);
		txtNuevaFecha.setText(null);

	}
}
