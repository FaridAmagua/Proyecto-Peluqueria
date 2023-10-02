package jpanel;

import java.awt.BorderLayout;

import java.awt.EventQueue;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;

import javax.swing.JFrame;
import javax.swing.*;
import javax.swing.border.EmptyBorder;

import Conexiones.Hash;

import javax.swing.JComboBox;
import javax.swing.DefaultComboBoxModel;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.ImageIcon;
import javax.swing.JTextField;
import javax.swing.JButton;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

public class VentanReservar extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	private JTextField txtFecha;
	private JTextField txtUsuario;
	private JButton BotonEnviar;
	private JComboBox ComboSexo;
	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VentanReservar frame = new VentanReservar();
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
	public VentanReservar() {
		setBounds(100, 100, 872, 605);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		this.setLocationRelativeTo(null);


		BotonEnviar = new JButton("Enviar\r\n");
		BotonEnviar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				try {
					Enviar();
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
		BotonEnviar.setBounds(689, 506, 89, 23);
		contentPane.add(BotonEnviar);

		txtUsuario = new JTextField();
		txtUsuario.setBounds(254, 245, 203, 30);
		contentPane.add(txtUsuario);
		txtUsuario.setColumns(10);

		txtFecha = new JTextField();
		txtFecha.setBounds(254, 340, 203, 30);
		contentPane.add(txtFecha);
		txtFecha.setColumns(10);

		ComboSexo = new JComboBox();
		ComboSexo.setModel(new DefaultComboBoxModel(new String[] {"Corte mujer", "Corte hombre", "Corte ni\u00F1o/a", "Mechas matizado", "Mechas cabello largo", "Mechas cabello medio", "Mechas cabello corto", "Decoloraci\u00F3n completa", "Tinte mascarilla color"}));
		ComboSexo.setToolTipText("\r\n");
		ComboSexo.setBounds(254, 424, 230, 31);

		contentPane.add(ComboSexo);

		JLabel lblNewLabel = new JLabel("\r\n");
		lblNewLabel.setIcon(new ImageIcon("C:\\Users\\farid\\OneDrive\\Documentos\\Proyecto\\LibreriaClase\\Reservar.png"));
		lblNewLabel.setBounds(0, 0, 856, 566);
		contentPane.add(lblNewLabel);
	}
	private void Enviar() throws SQLException    {


		Connection con = null;
		try {
			con = Conexiones.Conexion.getConnection();







		} catch (ClassNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println("ERROR CONEXION");
		}




		try {

			String query ="{call ReservarCita(?,?,?,?)}";
			CallableStatement cs = con.prepareCall(query);
			cs.setString(1,txtUsuario.getText());
			cs.setString(3,txtFecha.getText());		
			cs.setString(2,(String) ComboSexo.getSelectedItem());
			System.out.println(ComboSexo);			

			//Resto de sets

			cs.registerOutParameter(4, java.sql.Types.INTEGER);
			cs.execute();

			int resultado = cs.getInt(4);
			System.out.println(resultado);









			if (resultado == 0) {
				JOptionPane.showMessageDialog(null, "RESERVA HECHA  CORRECTAMENTE");
				borrar();
			}

			cs.close();




		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			JOptionPane.showMessageDialog(null, "RESERVA NO HECHA CORRECTAMENTE", "Algo anda mal", JOptionPane.WARNING_MESSAGE);

		}
	}
	private void borrar() {
		// TODO Auto-generated method stub
		txtFecha.setText(null);
		txtUsuario.setText(null);

	}
}