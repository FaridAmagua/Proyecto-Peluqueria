package jpanel;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import Conexiones.Hash;

import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.ImageIcon;
import javax.swing.JTextField;
import javax.swing.JButton;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import com.toedter.calendar.JCalendar;
import com.toedter.calendar.JDateChooser;

public class EliminarCita extends JFrame {

	private JPanel contentPane;
	private JTextField txtUsuario;
	private JTextField txtCorreo;
	private JTextField txtFecha;
	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					EliminarCita frame = new EliminarCita();
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
	public EliminarCita() {
		setBounds(100, 100, 873, 609);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		this.setLocationRelativeTo(null);


		txtUsuario = new JTextField();
		txtUsuario.setBounds(224, 142, 270, 30);
		contentPane.add(txtUsuario);
		txtUsuario.setColumns(10);

		txtCorreo = new JTextField();
		txtCorreo.setColumns(10);
		txtCorreo.setBounds(224, 244, 270, 30);
		contentPane.add(txtCorreo);

		txtFecha = new JTextField();
		txtFecha.setColumns(10);
		txtFecha.setBounds(224, 355, 270, 30);
		contentPane.add(txtFecha);

		JButton btnNewButton = new JButton("ENVIAR");
		btnNewButton.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {



				if (txtUsuario.getText().equals("") || txtCorreo.getText().equals("") || txtFecha.getText().equals("")) {

					JOptionPane.showMessageDialog(null, "POR FAVOR RELLENE TODOS LOS CAMPOS");
				}else {
					Call();
				}



			}	



		});
		btnNewButton.setBounds(696, 500, 114, 30);
		contentPane.add(btnNewButton);

		JLabel lblNewLabel = new JLabel("\r\n");
		lblNewLabel.setIcon(new ImageIcon("C:\\Users\\farid\\OneDrive\\Documentos\\Proyecto\\Imagenes\\ELIMINAR CITA.png"));
		lblNewLabel.setBounds(0, 0, 855, 573);
		contentPane.add(lblNewLabel);
	}

	public void Call() {

		Connection con = null;
		try {
			con = Conexiones.Conexion.getConnection();







		} catch (ClassNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println("ERROR CONEXION");
		}




		try {
			//ENCRIPTAR CONTRASEÑA




			String query ="{call QuitarCita(?,?,?,?)}";
			CallableStatement cs = con.prepareCall(query);
			cs.setString(1,txtUsuario.getText());
			cs.setString(2,txtCorreo.getText());
			cs.setString(3,txtFecha.getText());
			





			//Resto de sets


			cs.execute();


			int resultado = cs.getInt(4);



			cs.registerOutParameter(4, java.sql.Types.INTEGER);





			if (resultado == 0) {
				JOptionPane.showMessageDialog(null, "USUARIO ELIMINADO CORRECTAMENTE");
				borrar();
			}

			cs.close();




		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			JOptionPane.showMessageDialog(null, "USUARIO NO ELIMINADO COMPRUEBE BIEN LOS CAMPOS", "Algo anda mal", JOptionPane.WARNING_MESSAGE);
		}

	}

	private void borrar() {
		// TODO Auto-generated method stub
		txtUsuario.setText(null);
		txtCorreo.setText(null);
		txtFecha.setText(null);
	}
}
